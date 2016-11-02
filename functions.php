<?php
/* -----------------------------------------------------------------------
## パス設定 ##############################################################
----------------------------------------------------------------------- */
define( 'HOME_URI', home_url() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_IMAGES', THEME_URI . '/img' );
define( 'THEME_CSS', THEME_URI . '/css' );
define( 'THEME_JS', THEME_URI . '/js' );

/* -----------------------------------------------------------------------
## こまごました処理 ######################################################
----------------------------------------------------------------------- */
/* ### admin barを非表示に ############################### */
add_filter( 'show_admin_bar', '__return_false' );

/* ### 更新のお知らせを非表示 ############################ */
add_filter( 'pre_site_transient_update_core', '__return_zero' );

/* ### 固定ページのみビジュアルエディタを非表示に ############################################# */
function disable_visual_editor_in_page(){
  global $typenow;
  if($typenow == 'page'){
    add_filter('user_can_richedit', 'disable_visual_editor_filter');
  }
}
function disable_visual_editor_filter(){
  return false;
}
add_action('load-post.php', 'disable_visual_editor_in_page');
add_action('load-post-new.php', 'disable_visual_editor_in_page');

/* ### HTMLのクイックタグを追加 ############################### */
function add_my_quicktag() {
?>
  <script type="text/javascript">
    QTags.addButton('commonImg','テーマフォルダへのパスを挿入','/_wp/wp-content/themes/gear/','');
  </script>
<?php
}
add_action('admin_print_footer_scripts','add_my_quicktag');

/* ### 自動整形を無効にする ############################### */
//WP側で自動挿入されるpタグを削除する。
add_filter('the_content', 'wpautop_filter', 9);
function wpautop_filter($content) {
  global $post;
  $remove_filter = false;
  $arr_types = array('page'); //自動整形を無効にする投稿タイプを記述
  $post_type = get_post_type( $post->ID );
  if (in_array($post_type, $arr_types)) $remove_filter = true;
  if ( $remove_filter ) {
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
  }
  return $content;
}
/* ### WordPress へようこそ !を非表示にする ############################### */
function hide_welcome_panel() {
    $user_id = get_current_user_id();
    if(get_user_meta( $user_id, 'show_welcome_panel', true )) {
        update_user_meta( $user_id, 'show_welcome_panel', false );
    }
}
add_action( 'load-index.php', 'hide_welcome_panel' );

/* ### ダッシュボードウィジェットを削除します。 ############################### */
function remove_dashboard_widget() {
 	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // 概要
 	//remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' ); // アクティビティ
 	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // クイックドラフト
 	//remove_meta_box( 'dashboard_primary', 'dashboard', 'side' ); // WordPressニュース
} 
add_action('wp_dashboard_setup', 'remove_dashboard_widget' );

/* -----------------------------------------------------------------------
## Utilities #############################################################
----------------------------------------------------------------------- */
//スマホかどうかチェック
function is_mobile(){
  $useragents = array(
    'iPhone',          // iPhone
    'iPod',            // iPod touch
    'Android',         // 1.5+ Android
    'dream',           // Pre 1.5 Android
    'CUPCAKE',         // 1.5+ Android
    'blackberry9500',  // Storm
    'blackberry9530',  // Storm
    'blackberry9520',  // Storm v2
    'blackberry9550',  // Storm v2
    'blackberry9800',  // Torch
    'webOS',           // Palm Pre Experimental
    'incognito',       // Other iPhone browser
    'webmate'          // Other iPhone browser
  );
  $pattern = '/'.implode('|', $useragents).'/i';
  return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

//bodyタグに追加する属性
function body_attribute($attr){
  echo $attr;
}

/* -----------------------------------------------------------------------
## 以下はREST API用の追記 ################################################
----------------------------------------------------------------------- */
function wp_rest_api_castlists() {
  //REST APIにキャスト一覧のカスタムフィールドを追加する。
  $params = array(
    'get_callback'    => function($data, $field, $request, $type){
      $cfGroup = SCF::get('castlists');
      $cField = array();
        foreach ($cfGroup as $key => $value) {
          $imageId               = getImageIdToUrl($value['cast_img']);
          $cField[$key]['name']  = $value['cast_name'];
          $cField[$key]['class'] = $value['cast_class_name'];
          $cField[$key]['img']   = $imageId[0];
        }
      return $cField;
    },
    'update_callback' => null,
    'schema'          => null,
  );
  register_api_field('castlists', 'fields', $params);
}
add_action('rest_api_init', 'wp_rest_api_castlists');


function wp_rest_api_castschedules() {
  //REST APIにキャストスケジュールのカスタムフィールドを追加する。
  $params = array(
    'get_callback'    => function($data, $field, $request, $type){
      $cfGroup = SCF::get('schedules');
      $cField = array();
        foreach ($cfGroup as $key => $value) {
          $cField[$key]['suspend']  = $value['suspend'];
          $cField[$key]['date']     = $value['date'];
          $cField[$key]['weeks']    = $value['weeks'];
		  $cField[$key]['holiday']  = $value['holiday'];
          $cField[$key]['matinee']  = $value['matinee'];
          $cField[$key]['soiree']   = $value['soiree'];
          $cField[$key]['mime']     = $value['mime'];
          $cField[$key]['breakin']  = $value['breakin'];
          $cField[$key]['magic']    = $value['magic'];
          $cField[$key]['jaggling'] = $value['jaggling'];
          $cField[$key]['dall']     = $value['dall'];
          $cField[$key]['etc']      = $value['etc'];
        }
      return $cField;
    },
    'update_callback' => null,
    'schema'          => null,
  );
  register_api_field('schedules', 'fields', $params);
}
add_action('rest_api_init', 'wp_rest_api_castschedules');


function wp_rest_api_calender() {
  //REST APIに公演日程のカスタムフィールドを追加する。
  $params = array(
    'get_callback'    => function($data, $field, $request, $type){
      $cfGroup = SCF::get('calenders');
      $cField = array();
        foreach ($cfGroup as $key => $value) {
          $cField[$key]['suspend']        = $value['suspend'];
          $cField[$key]['date']           = $value['date'];
          $cField[$key]['weeks']          = $value['weeks'];
		  $cField[$key]['holiday']        = $value['holiday'];
          $cField[$key]['matinee']        = $value['matinee'];
          $cField[$key]['matinee_unsold'] = $value['matinee_unsold'];
          $cField[$key]['soiree']         = $value['soiree'];
          $cField[$key]['soiree_unsold']  = $value['soiree_unsold'];
          $cField[$key]['service']        = $value['service'];
          $cField[$key]['etc']            = $value['etc'];
        }
      return $cField;
    },
    'update_callback' => null,
    'schema'          => null,
  );
  register_api_field('calenders', 'fields', $params);
}
add_action('rest_api_init', 'wp_rest_api_calender');

function getImageIdToUrl($id){
  //画像IDから画像URLを返す
  return wp_get_attachment_image_src($id);
}


/* -----------------------------------------------------------------------
## 以下はCSV取り込み用の追記 #############################################
----------------------------------------------------------------------- */
function rsci_meta_filter( $meta, $post, $is_update ) {
  $meta_array = array();
  $repeater_array = array();
  if($post['post_type'] == 'schedules'){
    //投稿タイプが'schedules'の場合（「キャストスケジュール」CSV取込用）
    //キーがマッチしたら、カンマでまとめてある項目からカンマを外して配列として$meta_arrayの該当のキーに入れる。
    foreach ($meta as $key => $value) {
      if ($key == 'scf_date') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_weeks') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_suspend') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_holiday') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_matinee') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_soiree') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_mime') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_breakin') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_magic') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_jaggling') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_dall') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_etc') {
        $meta_array[$key] = explode(',', $value);
      } else {
        $meta_array[$key] = $value;
      }
    }
    return $meta_array;

  } elseif($post['post_type'] == 'calenders'){
    //投稿タイプが'calender'の場合（「公演日程」CSV取込用）
    //キーがマッチしたら、カンマでまとめてある項目からカンマを外して配列として$meta_arrayの該当のキーに入れる。
    foreach ($meta as $key => $value) {
      if ($key == 'scf_date') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_weeks') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_suspend') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_holiday') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_matinee') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_matinee_unsold') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_soiree') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_soiree_unsold') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_service') {
        $meta_array[$key] = explode(',', $value);
      } elseif ($key == 'scf_etc') {
        $meta_array[$key] = explode(',', $value);
      } else {
        $meta_array[$key] = $value;
      }
    }
    return $meta_array;
  }
}
add_filter( 'really_simple_csv_importer_save_meta', 'rsci_meta_filter', 10, 3 );

/* -----------------------------------------------------------------------
## アイキャッチ画像を有効 ################################################
----------------------------------------------------------------------- */
add_theme_support('post-thumbnails');

/* -----------------------------------------------------------------------
## 親ページのスラッグを取得 ##############################################
----------------------------------------------------------------------- */
function is_parent_slug() {
	global $post;
	if ($post->post_parent) {
		$post_data = get_post($post->post_parent);
		return $post_data->post_name;
	}
}

/* -----------------------------------------------------------------------
## WP-PageNavi (日本語以外) ##############################################
----------------------------------------------------------------------- */
if ( function_exists( 'wp_pagenavi' ) ) {
	function my_wp_pagenavi( $output ) {
		
	$url = $_SERVER['REQUEST_URI'];
	if(strstr($url,'?lang')){
		$output = str_replace( '前へ','Prev', $output );
		$output = str_replace( '次へ','Next', $output );
	}
return $output;
	}
	add_filter( 'wp_pagenavi', 'my_wp_pagenavi' );
}

/* -----------------------------------------------------------------------
## フォーム関連 ##############################################
----------------------------------------------------------------------- */
//団体鑑賞・貸切公演フォーム
function my_validation_rule1( $Validation ) {
    $Validation->set_rule( 'group', 'noEmpty', array('message' => '※ご予約団体名を入力してください') );
	$Validation->set_rule( 'group_detail', 'required', array('message' => '※団体概要を選択してください') );
	$Validation->set_rule( 'name', 'noEmpty', array('message' => '※ご担当者名を入力してください') );
	$Validation->set_rule( 'reservation_date', 'noEmpty', array('message' => '※ご予約日時を入力してください') );
	$Validation->set_rule( 'reservation_seat', 'noEmpty', array('message' => '※ご予約席数を入力してください') );
	$Validation->set_rule( 'tel', 'noEmpty', array('message' => '※電話番号（携帯可）を入力してください') );
	$Validation->set_rule( 'tel', 'tel', array('message' => '※電話番号の形式ではありません') );
	$Validation->set_rule( 'mail', 'noEmpty', array('message' => '※メールアドレスを入力してください') );
	$Validation->set_rule( 'mail', 'mail', array('message' => '※メールアドレスの形式ではありません') );
	$Validation->set_rule( 'mail_confirm', 'noEmpty', array('message' => '※メールアドレスを入力してください') );
	$Validation->set_rule( 'mail_confirm', 'eq', array('target'=>'mail' , 'message' => '※メールアドレスが一致しません') );
	$Validation->set_rule( 'mailad_confirm', 'noEmpty', array('message' => '※メールアドレス（確認）を入力してください') );
	$Validation->set_rule( 'mailad_confirm', 'mail', array('message' => '※メールアドレスの形式ではありません') );

	//$Validation->set_rule( 'address_pref', 'noEmpty', array('message' => '※グループの所在地（都道府県）を選択してください') );
	//$Validation->set_rule( 'address_city', 'noEmpty', array('message' => '※グループの所在地（市町村区）を選択してください') );
	//$Validation->set_rule( 'group_detail', 'noEmpty', array('message' => '※グループの種類を選択してください') );
	//$Validation->set_rule( 'name', 'noEmpty', array('message' => '※代表者様のお名前を入力してください') );	
	//$Validation->set_rule( 'tel_detail', 'noEmpty', array('message' => '※電話の種類を選択してください') );	
	//$Validation->set_rule( 'contact', 'noEmpty', array('message' => '※ご希望の連絡方法を入力してください') );
	
	return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-3202069', 'my_validation_rule1' );

//送信者情報追加
add_filter( 'mwform_admin_mail_mw-wp-form-3202069', 'my_admin_mail' );
function my_admin_mail( $Mail ) {
$Browser = $_SERVER["HTTP_USER_AGENT"];
$Ip = $_SERVER["REMOTE_ADDR"];
$Host = gethostbyaddr($Ip);
$Mail->body .= "\n\n【送信者情報】\n・ブラウザー：" .$Browser. "\n・送信元IPアドレス：" .$Ip. "\n・送信元ホスト名：" .$Host;
return $Mail;
}

/* -----------------------------------------------------------------------
## アーカイブ関連 ##############################################
----------------------------------------------------------------------- */
//アーカイブの記事数
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query) {
	//イベント
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('event')) {
        $query->set('posts_per_page', 5);
    }
	//ニュース
	elseif (!is_admin() && $query->is_main_query()) {
        $query->set('posts_per_page', 5);
    }
}
//イベントページアーカイブ
/* add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('event')) {
        $query->set('posts_per_page', 5);
    }
} */
/* -----------------------------------------------------------------------
## 画像サイズ関連 ##############################################
----------------------------------------------------------------------- */
//グッズ
add_image_size('resize_goods_img', 450, 9999);


/* -----------------------------------------------------------------------
## カスタム投稿（デフォルトカテゴリ設定） ############################
----------------------------------------------------------------------- */
// カスタム投稿タイプでカテゴリ未選択時にデフォルトで others を設定
function add_defaultcategory_automatically($post_ID) {
    global $wpdb;
    // 設定されているカスタム分類のタームを取得
    $curTerm = wp_get_object_terms($post_ID, 'news_category');
    // 既存のターム指定数が 0（つまり未設定）であれば）「misc」を指定
    if (0 == count($curTerm)) {
        // misc のターム ID
        $defaultTerm= array(45);
        wp_set_object_terms($post_ID, $defaultTerm, 'news_category');
    }
}
// news を作成する際に指定
add_action('publish_news', 'add_defaultcategory_automatically');

/* -----------------------------------------------------------------------
## アーカイブパラメーター ##############################################
----------------------------------------------------------------------- */
// アーカイブ表記に「年」を追加
function my_archives_link($html){
if(preg_match('/[0-9]+?<\/a>/', $html))
$html = preg_replace('/([0-9]+?)<\/a>/', '$1年</a>', $html);
/* if(preg_match('/title=[\'\"][0-9]+?[\'\"]/', $html))
$html = preg_replace('/(title=[\'\"][0-9]+?)([\'\"])/', '$1年$2', $html); */
return $html;
}
add_filter('get_archives_link', 'my_archives_link', 10);

/* 【出力カスタマイズ】wp_get_archives の年表記を置き換える */
add_filter('gettext', 'my_gettext', 20, 3);
function my_gettext($translated_text, $original_text, $domain) {
    if ($original_text == '%1$s %2$d') {
        $translated_text = '%2$s年%1$02d月';
    } 
    return $translated_text;
}

//多言語用
function get_archives_link2($url, $text, $format = 'html', $before = '', $after = '') {
    $text = wptexturize($text);
    $url = esc_url($url);
	global $lang;
 
    if ('link' == $format)
        $link_html = "\t<link rel='archives' title='" . esc_attr( $text ) . "' href='$url' />\n";
    elseif ('option' == $format)
        $link_html = "\t<option value='$url'>$before $text $after</option>\n";
    elseif ('html' == $format)
        $link_html = "\t<li>$before<a href='$url.$lang'>$text</a>$after</li>\n";
    else // custom
        $link_html = "\t$before<a href='$url'>$text</a>$after\n";
 
    /**
     * Filter the archive link content.
     *
     * @since 2.6.0
     *
     * @param string $link_html The archive HTML link content.
     */
    $link_html = apply_filters( 'get_archives_link', $link_html );
	if (strpos($link_html , '月')) {
		$link_html = str_replace('年','.',$link_html);
	}else {
		$link_html = str_replace('年','',$link_html);
	}
	$link_html = str_replace('月','',$link_html);
	
    return $link_html;
} 
 
function wp_get_archives2( $args = '' ) {
    global $wpdb, $wp_locale;
 
    $defaults = array(
        'type' => 'monthly', 'limit' => '',
        'format' => 'html', 'before' => '',
        'after' => '', 'show_post_count' => false,
        'echo' => 1, 'order' => 'DESC',
    );
 
    $r = wp_parse_args( $args, $defaults );
 
    if ( '' == $r['type'] ) {
        $r['type'] = 'monthly';
    }
 
    if ( ! empty( $r['limit'] ) ) {
        $r['limit'] = absint( $r['limit'] );
        $r['limit'] = ' LIMIT ' . $r['limit'];
    }
 
    $order = strtoupper( $r['order'] );
    if ( $order !== 'ASC' ) {
        $order = 'DESC';
    }
 
    // this is what will separate dates on weekly archive links
    $archive_week_separator = '&#8211;';
 
    // over-ride general date format ? 0 = no: use the date format set in Options, 1 = yes: over-ride
    $archive_date_format_over_ride = 0;
 
    // options for daily archive (only if you over-ride the general date format)
    $archive_day_date_format = 'Y/m/d';
 
    // options for weekly archive (only if you over-ride the general date format)
    $archive_week_start_date_format = 'Y/m/d';
    $archive_week_end_date_format   = 'Y/m/d';
 
    if ( ! $archive_date_format_over_ride ) {
        $archive_day_date_format = get_option( 'date_format' );
        $archive_week_start_date_format = get_option( 'date_format' );
        $archive_week_end_date_format = get_option( 'date_format' );
    }
 
    /**
     * Filter the SQL WHERE clause for retrieving archives.
     *
     * @since 2.2.0
     *
     * @param string $sql_where Portion of SQL query containing the WHERE clause.
     * @param array  $r         An array of default arguments.
     */
    $where = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'", $r );
 
    /**
     * Filter the SQL JOIN clause for retrieving archives.
     *
     * @since 2.2.0
     *
     * @param string $sql_join Portion of SQL query containing JOIN clause.
     * @param array  $r        An array of default arguments.
     */
    $join = apply_filters( 'getarchives_join', '', $r );
 
    $output = '';
 
    $last_changed = wp_cache_get( 'last_changed', 'posts' );
    if ( ! $last_changed ) {
        $last_changed = microtime();
        wp_cache_set( 'last_changed', $last_changed, 'posts' );
    }
 
    $limit = $r['limit'];
 
    if ( 'monthly' == $r['type'] ) {
        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date $order $limit";
        $key = md5( $query );
        $key = "wp_get_archives:$key:$last_changed";
        if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
            $results = $wpdb->get_results( $query );
            wp_cache_set( $key, $results, 'posts' );
        }
        if ( $results ) {
            $after = $r['after'];
            foreach ( (array) $results as $result ) {
                $url = get_month_link( $result->year, $result->month );
                /* translators: 1: month name, 2: 4-digit year */
                $text = sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $result->month ), $result->year );
                if ( $r['show_post_count'] ) {
                    $r['after'] = '&nbsp;(' . $result->posts . ')' . $after;
                }
                $output .= get_archives_link2( $url, $text, $r['format'], $r['before'], $r['after'] );
            }
        }
    } elseif ( 'yearly' == $r['type'] ) {
        $query = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date $order $limit";
        $key = md5( $query );
        $key = "wp_get_archives:$key:$last_changed";
        if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
            $results = $wpdb->get_results( $query );
            wp_cache_set( $key, $results, 'posts' );
        }
        if ( $results ) {
            $after = $r['after'];
            foreach ( (array) $results as $result) {
                $url = get_year_link( $result->year );
                $text = sprintf( '%d', $result->year );
                if ( $r['show_post_count'] ) {
                    $r['after'] = '&nbsp;(' . $result->posts . ')' . $after;
                }
                $output .= get_archives_link2( $url, $text, $r['format'], $r['before'], $r['after'] );
            }
        }
    } elseif ( 'daily' == $r['type'] ) {
        $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, DAYOFMONTH(post_date) AS `dayofmonth`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date), MONTH(post_date), DAYOFMONTH(post_date) ORDER BY post_date $order $limit";
        $key = md5( $query );
        $key = "wp_get_archives:$key:$last_changed";
        if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
            $results = $wpdb->get_results( $query );
            $cache[ $key ] = $results;
            wp_cache_set( $key, $results, 'posts' );
        }
        if ( $results ) {
            $after = $r['after'];
            foreach ( (array) $results as $result ) {
                $url  = get_day_link( $result->year, $result->month, $result->dayofmonth );
                $date = sprintf( '%1$d-%2$02d-%3$02d 00:00:00', $result->year, $result->month, $result->dayofmonth );
                $text = mysql2date( $archive_day_date_format, $date );
                if ( $r['show_post_count'] ) {
                    $r['after'] = '&nbsp;(' . $result->posts . ')' . $after;
                }
                $output .= get_archives_link2( $url, $text, $r['format'], $r['before'], $r['after'] );
            }
        }
    } elseif ( 'weekly' == $r['type'] ) {
        $week = _wp_mysql_week( '`post_date`' );
        $query = "SELECT DISTINCT $week AS `week`, YEAR( `post_date` ) AS `yr`, DATE_FORMAT( `post_date`, '%Y-%m-%d' ) AS `yyyymmdd`, count( `ID` ) AS `posts` FROM `$wpdb->posts` $join $where GROUP BY $week, YEAR( `post_date` ) ORDER BY `post_date` $order $limit";
        $key = md5( $query );
        $key = "wp_get_archives:$key:$last_changed";
        if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
            $results = $wpdb->get_results( $query );
            wp_cache_set( $key, $results, 'posts' );
        }
        $arc_w_last = '';
        if ( $results ) {
            $after = $r['after'];
            foreach ( (array) $results as $result ) {
                if ( $result->week != $arc_w_last ) {
                    $arc_year       = $result->yr;
                    $arc_w_last     = $result->week;
                    $arc_week       = get_weekstartend( $result->yyyymmdd, get_option( 'start_of_week' ) );
                    $arc_week_start = date_i18n( $archive_week_start_date_format, $arc_week['start'] );
                    $arc_week_end   = date_i18n( $archive_week_end_date_format, $arc_week['end'] );
                    $url            = sprintf( '%1$s/%2$s%3$sm%4$s%5$s%6$sw%7$s%8$d', home_url(), '', '?', '=', $arc_year, '&amp;', '=', $result->week );
                    $text           = $arc_week_start . $archive_week_separator . $arc_week_end;
                    if ( $r['show_post_count'] ) {
                        $r['after'] = '&nbsp;(' . $result->posts . ')' . $after;
                    }
                    $output .= get_archives_link2( $url, $text, $r['format'], $r['before'], $r['after'] );
                }
            }
        }
    } elseif ( ( 'postbypost' == $r['type'] ) || ('alpha' == $r['type'] ) ) {
        $orderby = ( 'alpha' == $r['type'] ) ? 'post_title ASC ' : 'post_date DESC ';
        $query = "SELECT * FROM $wpdb->posts $join $where ORDER BY $orderby $limit";
        $key = md5( $query );
        $key = "wp_get_archives:$key:$last_changed";
        if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
            $results = $wpdb->get_results( $query );
            wp_cache_set( $key, $results, 'posts' );
        }
        if ( $results ) {
            foreach ( (array) $results as $result ) {
                if ( $result->post_date != '0000-00-00 00:00:00' ) {
                    $url = get_permalink( $result );
                    if ( $result->post_title ) {
                        /** This filter is documented in wp-includes/post-template.php */
                        $text = strip_tags( apply_filters( 'the_title', $result->post_title, $result->ID ) );
                    } else {
                        $text = $result->ID;
                    }
                    $output .= get_archives_link2( $url, $text, $r['format'], $r['before'], $r['after'] );
                }
            }
        }
    }
    if ( $r['echo'] ) {
        echo $output;
    } else {
        return $output;
    }
}

?>
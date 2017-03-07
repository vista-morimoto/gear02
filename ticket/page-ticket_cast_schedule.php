<?php /*Template Name: チケット予約 - キャストスケジュール */ ?>
<?php 
$description = '組み合わせによって見え方の異なる『ギア-GEAR-』。気になるキャストが出演する公演日に絞って検索することもできます。京都で出逢える感動エンターテイメント『ギア-GEAR-』は、絶賛ロングラン公演中！';

$cssLink = '<link rel="stylesheet" href="'.THEME_CSS.'/ticket.css">';
$jsLink_top = '';
$jsLink_btm = '
<script src="'.THEME_JS.'/cast_schedule.js"></script>
<script src="'.THEME_JS.'/ticket.js"></script>
';
get_header();
?>

<main class="mainContents">
<article>
<section id="castSchedule" class="castSchedule section">
<!--Vue.jsで監視している範囲（キャストスケジュール用） -->
<div id="castScheduleArea" class="sectionInner">

<p class="fz12 castScheduleAttention"><span>出演者は事前予告なく変更になる可能性​がございます。<br class="pc_none" />​予めご了承ください。</span></p>

<ul class="castScheduleNavi clearfix navi">
	<li class="castScheduleNavi_item">
	<div class="selectWrapper">
	<select name="" id="" onchange="month_select()">
	<!--v-forを使ってschedulesVm.selectの値を全て表示。itemはschedulesVm.selectの各値 -->
	<option value="{{item}}" v-for="item in select">{{item}}</option>
	</select>
	</div>
	</li>
	<li class="castScheduleNavi_item prev"><a href="#" class="ani-reverseBtn" onClick="month_select();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> 前の月へ</a></li>
	<li class="castScheduleNavi_item next"><a href="#" class="ani-reverseBtn" onClick="month_select();">次の月へ <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></li>
</ul>

<div class="castScheduleTable">
<div class="castScheduleTable_header">
<div class="date">公演日</div>

<div class="players clearfix">
<div class="players_item mime"><span>マイム</span>
<div class="selectWrapper">
	<select name="" id="mime" v-model="mime" onchange="cast_select()"><!--v-model="mime"でテーブル側のマイムのキャスト名と関連付ける -->
	<option value="" selected="selected">選択しない</option>
	<!-- v-forを使ってschedulesVm.cast['mime']の値を全て表示。itemはschedulesVm.cast['mime']内の一人づつのデータ -->
	<option value="{{item}}" v-for="item in cast['mime']">{{item}}</option>
	</select>
</div>
</div>

<div class="players_item breakin"><span>ブレイク</span>
<div class="selectWrapper">
	<select name="" id="breakin" v-model="breakin" onchange="cast_select()"><!--v-model="breakin"でテーブル側のブレイクのキャスト名と関連付ける -->
	<option value="" selected="selected">選択しない</option>
	<!-- v-forを使ってschedulesVm.cast['breakin']の値を全て表示。itemはschedulesVm.cast['breakin']内の一人づつのデータ -->
	<option value="{{item}}" v-for="item in cast['breakin']">{{item}}</option>
	</select>
</div>
</div>

<div class="players_item magic"><span>マジック</span>
<div class="selectWrapper">
	<select name="" id="magic" v-model="magic" onchange="cast_select()"><!--v-model="magic"でテーブル側のマジックのキャスト名と関連付ける -->
	<option value="" selected="selected">選択しない</option>
	<!-- v-forを使ってschedulesVm.cast['magic']の値を全て表示。itemはschedulesVm.cast['magic']内の一人づつのデータ -->
	<option value="{{item}}" v-for="item in cast['magic']">{{item}}</option>
	</select>
</div>
</div>

<div class="players_item jaggling"><span>ジャグリング</span>
<div class="selectWrapper">
	<select name="" id="jaggling" v-model="jaggling" onchange="cast_select()"><!--v-model="jaggling"でテーブル側のジャグリングのキャスト名と関連付ける -->
	<option value="" selected="selected">選択しない</option>
	<!-- v-forを使ってschedulesVm.cast['jaggling']の値を全て表示。itemはschedulesVm.cast['jaggling']内の一人づつのデータ -->
	<option value="{{item}}" v-for="item in cast['jaggling']">{{item}}</option>
	</select>
</div>
</div>

<div class="players_item dall"><span>ドール</span>
<div class="selectWrapper">
	<select name="" id="dall" v-model="dall" onchange="cast_select()"><!--v-model="dall"でテーブル側のドールのキャスト名と関連付ける -->
	<option value="" selected="selected">選択しない</option>
	<!-- v-forを使ってschedulesVm.cast['dall']の値を全て表示。itemはschedulesVm.cast['dall']内の一人づつのデータ -->
	<option value="{{item}}" v-for="item in cast['dall']">{{item}}</option>
	</select>
</div>
</div>
</div>
</div>

<table class="castScheduleList">

<tbody v-if="schedule[0].nodata">
<!-- v-cloakは値がセットされるまでの属性。値がセットされると削除される。css側に.noData[v-cloak]{display:none;}を記述しています。 -->
<tr class="noData" v-cloak><!-- schedule[0].nodataがセットされていた場合、出力する -->
	<td>{{schedule[0].nodata}}</td>
</tr>
</tbody>
<!-- schedule[0].nodataがセットされていた場合、出力する -->

<!-- Vue.js のテンプレート機能を使って一覧を表示 -->
<!-- filterByにより、先のv-modelと関連付け -->
<tbody v-for="item in schedule[0] | filterBy mime in 'mime' | filterBy breakin in 'breakin' | filterBy magic in 'magic' | filterBy jaggling in 'jaggling' | filterBy dall in 'dall'" class="cast_table">

<!-- 休演日ではない場合表示するタグ -->
<tr v-if="!item.suspend">
	<th class="date_item day {{item.holiday}}">{{item.date}}</th>
	<th class="date_item weeks {{item.holiday}}">{{item.weeks}}</th>
	<th class="date_item time"><span v-if="item.matinee != 'none'">{{item.matinee}}</span><span v-if="(item.matinee != ''&& item.soiree != '')"> / </span><span v-if="item.soiree != 'none'">{{item.soiree}}</span></th><!-- マチネ、ソワレ、それぞれ値がnoneではない時に表示。/は両方空ではない時だけ表示(=片方が空だと非表示) -->
	<td class="players_item mime {{item.mime_class}}"><!--<img :src="item.mime_img" v-show="item.mime_img" alt="">-->{{item.mime}}</td><!-- item.mimeがv-model="mime"で選択した値と一致した場合と、選択しないを選んでいる場合だけ表示される -->
	<td class="players_item breakin {{item.breakin_class}}"><!--<img :src="item.breakin_img" v-show="item.breakin_img" alt="">-->{{item.breakin}}</td><!-- item.breakinがv-model="breakin"で選択した値と一致した場合と、選択しないを選んでいる場合だけ表示される -->
	<td class="players_item magic {{item.magic_class}}"><!--<img :src="item.magic_img" v-show="item.magic_img" alt="">-->{{item.magic}}</td><!-- item.magicがv-model="magic"で選択した値と一致した場合と、選択しないを選んでいる場合だけ表示される -->
	<td class="players_item jaggling {{item.jaggling_class}}"><!--<img :src="item.jaggling_img" v-show="item.jaggling_img" alt="">-->{{item.jaggling}}</td><!-- item.jagglingがv-model="jaggling"で選択した値と一致した場合と、選択しないを選んでいる場合だけ表示される -->
	<td class="players_item dall {{item.dall_class}}"><!--<img :src="item.dall_img" v-show="item.dall_img" alt="">-->{{item.dall}}</td><!-- item.dallがv-model="dall"で選択した値と一致した場合と、選択しないを選んでいる場合だけ表示される -->
</tr>

<!-- 休演日の場合表示するタグ -->
<tr class="suspend" v-else>
	<th class="date_item day {{item.holiday}}">{{item.date}}</th>
	<th class="date_item weeks {{item.holiday}}">{{item.weeks}}</th>
	<th class="date_item time"></th>
	<td colspan="5">{{item.etc}}</td>
</tr>

</tbody>
</table>
</div>

<!--<p v-show="filteredItems.length > 0">結果は{{filteredItems.length}}件です</p>
<p v-show="filteredItems.length == 0">{{filteredItems.length}}</p>

<p v-show="filteredItems2.length > 0">結果は{{filteredItems2.length}}件です</p>
<p v-show="filteredItems2.length == 0">{{filteredItems2.length}}</p> --> 
	
<p class="no_cast">現在この組み合わせはありません</p>

<button class="loading resetBtn">組み合わせをリセットする</button>
<div class="loader"><i class="fa fa-cog fa-spin fa-fw"></i><br><span>Loading...</span></div>
</div>
<!--  Vue.jsで監視している範囲（キャストスケジュール用）ここまで -->

</section>
</article>
</main>

<?php get_footer(); ?>
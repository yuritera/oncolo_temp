<section class="ranking_wrap" id="homeRanking">
  <h2 class="ttl_bblue">記事ランキング</h2>
  <nav class="ranking_nav">
  <ul class="ranking_nav_list">
    <li class="ranking_nav_item" @click="show('day')" v-bind:class="{'active': current === 'day'}">日間</li>
    <li class="ranking_nav_item" @click="show('week')" v-bind:class="{'active': current === 'week'}">週間</li>
    <li class="ranking_nav_item" @click="show('month')" v-bind:class="{'active': current === 'month'}">月間</li>
  </ul>
</nav>
<div class="ranking_body">
<transition name="fade" mode="out-in">
  <?php
  function popularOption($range){
    //除外する記事ID
    $pid = '6295,5593,4901,7073,7147,6938,6934,5132,986,7522,4554,5053,8732,8641,8935,8803,8122,9371,9290,9669,10233,10095,9977,10499,13327,14015,13422,14211,14181,13422,14211,14181,15197,7664,15278,17076,15991,16060,18567,16113,18524,18563,17946,3402,15605,2689,23217,23068,23070,21201,23057,23059,23065,23068,23070,23217,23345,23342,23449,24091,21729,23747,21820,27478,25609,7390,13176,33111,35878,34828,35306,25178,28097,27255,27273,25556,37840,31593,40375,39845,39915,35878,33111,41918,43852';
    $options = array(
      'limit' => 10,
      'range' => $range,
      'order_by' => 'views',
      'post_type' => 'post',
      'pid' => $pid,
      'freshness' => 0,
      'stats_views' => 0,
    );
    return $options;
  }
  ?>
  <div class="ranking_list" v-if="isCurrent('day')" key="day">
    <?php
    $options = popularOption('daily');
    wpp_get_mostpopular($options);
    ?>
  </div>

  <div class="ranking_list" v-if="isCurrent('week')" key="week">
    <?php
    $options = popularOption('weekly');
    wpp_get_mostpopular($options);
    ?>
  </div>

  <div class="ranking_list" v-if="isCurrent('month')" key="month">
    <?php
    $options = popularOption('monthly');
    wpp_get_mostpopular($options);
    ?>
  </div>
</transition>
</div>
<script>
new Vue({
  el:'#homeRanking',
  data:{
    current:'day',
    },
  methods:{
    show:function(name){
      this.current = name;
    },
    isCurrent:function(name){
      return this.current == name;
    },
  }
})
</script>
</section>

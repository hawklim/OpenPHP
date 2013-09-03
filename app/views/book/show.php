      <!-- display books -->
      <div id="book" class="container">
        <div class="page-header light-bar">
          <h3><?=$book_data->title?></h3>
        </div>
        <div class="row">
          <div class="span4">
            <img src="<?=img_url(base_url($book_data->thumb))?>" alt="" style="width:240px; height:300px"/>
          </div>
          <div class="span8">
            <ul id="summary" class="unstyled">
              <li><span>作 &nbsp &nbsp 者：</span><?=$book_data->author?></li>
              <li><span>出 版 社：</span><?=$book_data->publisher?></li>
              <li><span>所属分类：</span>计算机 > 编程语言</li>
              <li><span>新旧程度：</span><?=$book_data->condition?> 成新</li>
            </ul>
            <ul id="book-price" class="unstyled">
              <li><span>原 &nbsp &nbsp 价：</span><span class="price"><del>￥<?=$book_data->costprice?></del></span></li>
              <li><span>二 手 价：</span><span class="price">￥<?=$book_data->price?></span></li>
              <li><span>数 &nbsp &nbsp 量：</span><?=$book_data->amount?> 本</li>
            </ul>
            <ul id="trade" class="unstyled">             
              <li><span>联 系 人：</span></li>
              <li><span>联系电话：</span><?=$book_data->tel?></li>
              <li><span>&nbsp &nbsp &nbsp &nbsp QQ：</span><?=$book_data->qq?></li>
              <li><span>交易地点：</span><?=$school->schoolname?> <?=$book_data->tradeaddr?></li>
              <li><span>发布时间：</span><?=date('Y-m-d', $book_data->addtime)?></li>
            </ul>
          </div>
        
        </div>
        <div id="book-detail" class="row">
          <div id="headbar" class="span12 light-bar">
            <h5>详细介绍</h5>
          </div>
          <div class="span12">
            <p><?=$book_data->description?></p>
          </div>
        </div>
      </div>
      <!-- end display book -->

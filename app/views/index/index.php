   <div id="myCarousel" class="carousel slide">
    <!-- Carousel items -->
    <div class="carousel-inner">
    <div class="active item"><img src="<?php echo base_url('public/image/1.png');?>"></img></div>
    <div class="item"><img src="<?php echo base_url('public/image/1.png');?>"></img></div>
    <div class="item"><img src="<?php echo base_url('public/image/1.png');?>"></img></div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>

      <!-- display books -->
      <div id="book" class="container">
        <div class="tabbable">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#newRelease" data-toggle="tab">最新发布</a></li>
            <li><a href="#newRecommend" data-toggle="tab">最新推荐</a></li>
          </ul>
       
          <div class="tab-content">
            <div class="tab-pane active" id="newRelease">           
              <div class="container">
              <?php foreach($new_release as $r_book): ?>
                <article class="screenshot">
                  <div class="">
                    <a href="<?=base_url('book/show/'.$r_book->bid)?>"> <img src="<?=img_url(base_url($r_book->thumb))?>" alt="" style="width:160px; height:200px" /></a>
                  </div>
                  <footer>
                    <a href="<?=base_url('book/show/'.$r_book->bid)?>">[出售] <?=$r_book->title?></a>
                    <p>[地点] <?=dsubstr($r_book->schoolname.$r_book->tradeaddr, 8, '...')?> <span class="price pull-right">￥ <?=$r_book->price?></span></p>                 
                  </footer>
                </article>
              <?php endforeach; ?>  
              </div>
              <!--
              <footer>
                <div class="pagination pull-right">
                  <ul>
                    <li><a href="#">前一页</a></li>
                    <li class="active">
                      <a href="#">1</a>
                    </li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">后一页</a></li>
                  </ul>
                </div>
              </footer>
              -->
            </div>
            <div class="tab-pane" id="newRecommend">        
              <div class="container">
              <?php foreach($new_recommend as $c_book): ?>
                <article class="screenshot">
                  <div class="">
                    <a href="<?=base_url('book/show/'.$c_book->bid)?>"><img src="<?=img_url(base_url($c_book->thumb))?>" alt="" style="width:160px; height:200px" /></a>
                  </div>
                  <footer>
                    <a href="<?=base_url('book/show/'.$c_book->bid)?>">[出售] <?=$c_book->title?></a>
                    <p>[地点] <?=dsubstr($c_book->schoolname.$c_book->tradeaddr, 8, '...')?> <span class="price pull-right">￥ <?=$c_book->price?></span></p>                 
                  </footer>
                </article>
              <?php endforeach; ?>                
              
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end display book -->
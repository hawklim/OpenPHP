
      <!-- display books -->
      <div id="book" class="container">
        <div class="row" id="statebar">
          <div class="span12">
            <div id="navPage" class="btn-group pull-right">
              <a class="btn" href="<?=$prev_page?>"><span class="icon-chevron-left"></span></a>
              <a class="btn" href="<?=$next_page?>"><span class="icon-chevron-right"></span></a>
            </div>

            <div id="orderBy" class="btn-group" data-toggle="buttons-radio">
              <a href="<?php echo base_url('book/search/'.$word.'/2');?>" class="btn">价格 <i class="icon-arrow-up"></i></a>
              <a href="<?php echo base_url('book/search/'.$word.'/1');?>" class="btn">发布时间 <i class="icon-arrow-up"></i></a>
              <a href="<?php echo base_url('book/search/'.$word.'/3');?>" class="btn">出版时间 <i class="icon-arrow-up"></i></a>              
            </div>

          </div>
          <div class="span12">
            <div class="alert alert-info">
            关键词：<?php echo $word;?> 共搜索到<?php echo $counts;?>条相关信息     
            </div>
          </div>
        </div>
        <div class="container">         
        <?php foreach($book_data as $book): ?>    
          <div class=" row show-grid">
            <div class="span3">
                    <a href="<?=base_url('book/show/'.$book->bid)?>"> <img src="<?=img_url(base_url($book->thumb))?>" alt="" style="width:160px; height:200px" /></a>
            </div>
            <div class="span9">
              <table class="table-typography">
                <tr>
                	<td>[书名]</td>
                	<td><?=$book->title?></td>
                </tr>
                <tr>
                	<td>[出版社]</td>
                	<td><?=$book->publisher?></td>
                </tr>
                <tr>
                	<td>[交易地点]</td>
                	<td> <?=$book->schoolname.$book->tradeaddr?></td>
                </tr>
                <tr>
                	<td>[售价]</td>
                	<td><span class="price">￥<?=$book->price?></span></td>
                </tr>
                <tr>
                	<td>[数量]</td>
                	<td><?=$book->amount?>本</td>
                </tr>
                
              </table>

            </div>
          </div>
      	  <?php endforeach; ?>           
          </div>
        </div>

        <footer>
          <div class="pagination pull-right">
            <ul>
              <?=$paging?>
            </ul>
          </div>
        </footer>
        
      </div>
      <!-- end display book -->

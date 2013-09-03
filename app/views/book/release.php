      <!-- display books -->
      <div class="container">
        <div class="row">
          <div class="span8">
			<?php  
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform'); 
					echo form_open_multipart('book/release', $attributes);  
			?>          
              <fieldset>
                <legend class="light-bar">消息发布</legend>
                <div class="control-group">
                  <label class="control-label" for="title">书名<i class="red">*</i></label>
                  <div class="controls">
                    <input id="title" name="title" type="text" class="input-large" value="<?=set_value('title',isset($book->title)?$book->title:'');?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="author">作者</label>
                  <div class="controls">
                    <input id="author" name="author" type="text" class="input-large" value="<?=set_value('author',isset($book->author)?$book->author:'');?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="publisher">出版社</label>
                  <div class="controls">
                    <input id="publisher" name="publisher" type="text" class="input-large" value="<?=set_value('publisher',isset($book->publisher)?$book->publisher:'');?>">
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="state">状态</label>
                  <div class="controls">
                    <select id="state" name="state" class="span2">
                    <?php if(get_action() != 'edit') {
							 foreach($state as $s_item): 
                                echo "<option value='".$s_item->sid."'>".$s_item->statename."</option> ";  
                         	 endforeach;
                    	  } else {
							 foreach($state as $s_item):
                        		 if($s_item->sid == $book->state){ 
                            		echo "<option selected value='".$s_item->sid."'>".$s_item->statename."</option> ";   
                            	 } else {
                               		echo "<option value='".$s_item->sid."'>".$s_item->statename."</option> ";     
                           		 }   
                        	 endforeach;                
                    	}?>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="state">分类</label>
                  <div class="controls">
				  	<?php echo category_select('catid', '选择分类', 0); ?>
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="uploadfile">照片</label>
                  <div class="controls">
                    <input class="uploadfile" id="fileInput" name="pic" type="file">
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="costprice">原价<i class="red">*</i></label>
                  <div class="controls">
                    <div class="input-prepend input-append">
                      <span class="add-on price" style="color: black">￥</span>
                      <input id="costprice" name="costprice" type="text" class="span1" value="<?=set_value('costprice',isset($book->costprice)?$book->costprice:'');?>">
                      <span class="add-on">.00</span>
                    </div>
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="price">二手价<i class="red">*</i></label>
                  <div class="controls">
                    <div class="input-prepend input-append">
                      <span class="add-on price" style="color: black">￥</span>
                      <input id="price" name="price" type="text" class="span1" value="<?=set_value('price',isset($book->price)?$book->price:'');?>">
                      <span class="add-on">.00</span>
                    </div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="amount">数量</label>
                  <div class="controls">
                    <div class="input-append">
                      <input id="amount" name="amount" type="number" class="span1" value="<?=set_value('amount',isset($book->amount)?$book->amount:'');?>">
                      <span class="add-on">本</span>
                    </div>          
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="condition">新旧程度</label>
                  <div class="controls">
                    <div class="input-append">
                      <input id="condition" name="condition" type="number" class="span1" value="<?=set_value('amount',isset($book->condition)?$book->amount:'');?>">
                      <span class="add-on">成新</span>
                    </div>    
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="trade_school">交易地点</label>
                  <div class="controls">
                    <div class="input-append">
                      <select id="trade_school" name="schoolid" class="span2">   
                   		 <?php if(get_action() != 'edit') {
							 foreach($school as $s2_item): 
                                echo "<option value='".$s2_item->sid."'>".$s2_item->schoolname."</option> ";  
                         	 endforeach;
                    	  } else {
							 foreach($school as $s2_item):
                        		 if($s2_item->sid == $book->schoolid){ 
                            		echo "<option selected value='".$s2_item->sid."'>".$s2_item->schoolname."</option> ";   
                            	 } else {
                               		echo "<option value='".$s2_item->sid."'>".$s2_item->schoolname."</option> ";     
                           		 }   
                        	 endforeach;                
                    	}?>                                                           
                      </select>
                      <input type="text" name="tradeaddr" class="add-on" placeholder="具体地点" value="<?=set_value('tradeaddr',isset($book->tradeaddr)?$book->tradeaddr:'');?>" style="text-align: left; background: white;"/>
                    </div>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="phone">联系方式<i class="red">*</i></label>
                  <div class="controls">
                    <div class="input-append">
                      <input id="phone" name="tel" type="text" class="span2" value="<?=set_value('tel',isset($book->tel)?$book->tel:'');?>" placeholder="手机号码" >
                      <input type="text" name="shorttel" class="add-on" value="<?=set_value('shorttel',isset($book->shorttel)?$book->shorttel:'');?>" placeholder="短号" style="text-align: left; background: white;"/>
                      <input type="text" name="qq" class="add-on" value="<?=set_value('qq',isset($book->qq)?$book->qq:'');?>" placeholder="QQ" style="text-align: left; background: white;"/>
                    </div>
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label" for="description">我有话说</label>
                  <div class="controls">
                    <textarea id="description" name="description" type="text" class="span5" rows="3" 
                    placeholder="这是详细介绍， 可以使关于这本书的介绍，也可以是一些详细的要求。"><?=set_value('description',isset($book->description)?$book->description:'');?></textarea>
                  </div>
                </div>
                
                <div class="form-actions">
                  <input type="submit" id="submit" name="submit" class="btn btn-primary" value="发布" />                
                  <input type="reset" class="btn" value="重置" />
                </div>
              </fieldset>
              <?php if(get_action() == 'edit') {?>
              <input type="hidden" name="edit" value="1" />
              <?php }?>
            </form>          
          </div>
          <div class="span4">
          	<?php if(get_action()=='edit') {?>
            <div id="same-book-header" class="light-bar"><legend>相同书名的书</legend></div>
				<?php foreach($same_book as $book2): ?> 
                <div class="row">
                  <div class="span4 light-bar"><h5><?=$book2->title?></h5></div>
                  <div class="span2"><img src="<?=img_url(base_url($book2->thumb))?>" style="width:130px; height:163px"/></div>
                  <div class="span2" style="font-size:.7em;">
                    <ul class="unstyled">
                      <li><span>作 &nbsp &nbsp 者：</span><?=$book2->author?></li>
                      <li><span>出 版 社：</span><?=$book2->publisher?></li>
                      <li><span>新旧程度：</span><?=$book2->condition?> 成新</li>
                      <li><span>原 &nbsp &nbsp 价：</span><span class="price" style="font-size:.5em;"><del>￥<?=$book2->costprice?>.00</del></span></li>
                      <li><span>二 手 价：</span><span class="price" style="font-size:.5em;">￥<?=$book2->price?>.00</span></li>
                      <li><span>数 &nbsp &nbsp 量：</span><?=$book2->amount?> 本</li>
                      <li><a href="<?php echo base_url('book/show/'.$book2->bid);?>" class="btn btn-small">详细 <i class="icon-th-list"></i></a></li>
                    </ul>
                  </div>
                </div>
                <hr />
                <?php endforeach;?>
          </div>
          	<?php }?>
        </div>
      </div>
      <!-- end display book -->

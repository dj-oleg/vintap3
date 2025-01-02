<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$this->title = $meta->longtitle;
// $this->registerMeta<link href="/css/my_style.css" rel="stylesheet">Tag(['name' => 'description', 'content' => $meta->description], 'description');
$this->registerMetaTag(['name' => 'keywords', 'content' => $meta->introtext]);
?>
<style>
.gradient:after {
	content: "";
	display: block;
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	background: transparent;
	background-image: linear-gradient(to right, rgba(0,0,0,1), 85%, rgba(255,255,255,0));
	/*opacity: 0.5;*/
}
.imgsize{
  position: absolute;
   top:-30%;
   right: 0%;
   transform:translate(0%,0%);
   height:160%;
   object-fit:cover;
}





/* товары */






/* 29_12 товары*/
/* Основной стиль адаптации */

/* тут был exp.css */


/* * {
    overflow: visible !important;
} */

/* 29_12 */






</style>





   <div class="w-full">
      <div data-fetch-key="0" class="-mt-12 md:mt-16">
         <div>
            <div class="hero-slider -mx-4 -mt-10 overflow-hidden border-white/[0.12] dark:border-white/[0.04] md:mx-0 md:mt-0 md:rounded-3xl md:border">      
            </div>
         </div>


         <div class="overflow-hidden mt-12 pb-10 md:mt-16 md:pb-0">
            <div class="flex items-center justify-between">
               <h2 class="text-xl font-medium leading-tight sm:text-[28px]">What's the latest</h2>
            </div>
            <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">Check out the latest packs uploaded by the top creators.</p>
            
      
            



            <!-- <div class="swiper mt-6">
               <div class="swiper-wrapper">
                  <?php foreach ($packs_new as $pack): ?>
                     <div class="swiper-slide">
                        <div class="group flex flex-col items-center text-center">
                           

                           <div class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100" style="width: 172px; height: 172px;">
                            
                              <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" 
                                 class="block h-full w-full bg-center bg-cover" 
                                 style="background-image: url('<?= Yii::$app->request->baseUrl ?>/modx/<?= $pack['img'] ?>');"></a>
                          
                              <div class="play-overlay">
                                 <button class="play-button" audio_id="<?= $pack['id'] ?>" data-audio="<?= $pack['id'] ?>">
                                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                       <polygon points="25,20 50,32 25,44" fill="white"></polygon>
                                    </svg>
                                 </button>
                              </div>
                           </div>


                           <div class="mt-4">
                              <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" class="font-medium hover:underline"><?= $pack['title'] ?></a>
                              <p class="text-sm text-gray-500"><?= $pack['creator'] ?> | <?= $pack['count_songs'] ?> songs</p>
                              <p class="text-green-600 font-semibold"><?= $pack['price'] ?> $</p>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
               
               <div class="slider-prev">←</div>
               <div class="slider-next">→</div>
            </div> -->



                     

            <div class="swiper mt-6">
               <div class="swiper-wrapper">
               <?php foreach ($packs_new as $pack): ?>
                     <div class="swiper-slide">
                        <div class="group flex flex-col items-center text-center">
                           

                           <div class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100" style="width: 172px; height: 172px;">
                            
                              <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" 
                                 class="block h-full w-full bg-center bg-cover" 
                                 style="background-image: url('<?= Yii::$app->request->baseUrl ?>/modx/<?= $pack['img'] ?>');"></a>

                              <div class="play-overlay">
                              <button class="play-button" audio_id="<?= $pack['id'] ?>" data-audio="<?= $pack['id'] ?>" data-file="<?= $pack['audio_file'] ?>">
                                 <!-- Иконка Play -->
                                 <svg class="play-icon" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                    <polygon points="25,20 50,32 25,44" fill="white"></polygon>
                                 </svg>
                                 <!-- Иконка Stop -->
                                 <svg class="stop-icon hidden" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                    <rect x="24" y="24" width="16" height="16" fill="white"></rect>
                                 </svg>
                              </button>
                              </div>


                           </div>


                           <div class="mt-4">
                              <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" class="font-medium hover:underline"><?= $pack['title'] ?></a>
                              <p class="text-sm text-gray-500"><?= $pack['creator'] ?> | <?= $pack['count_songs'] ?> songs</p>
                              <p class="text-green-600 font-semibold"><?= $pack['price'] ?> $</p>
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
               
               <div class="slider-prev">←</div>
               <div class="slider-next">→</div>
            </div> 



            




         </div>

         <div class="-mx-4 h-px bg-black/[0.12] dark:bg-white/[0.12] md:hidden"></div>
         <div class="overflow-hidden mt-10 pb-10 md:mt-24 md:pb-0">
            <div class="flex items-center">
               <div class="flex w-full items-center space-x-3 sm:w-auto">
                  <h2 class="text-xl font-medium leading-[18px] tracking-[-0.25px] sm:text-[28px] sm:leading-8">Top Chart</h2>

               </div>
               <div class="ml-auto hidden space-x-2.5 text-[0px] sm:block">
          
               </div>
            </div>
            <p class="mt-4 text-[15px] leading-[18px] text-5c5c5c dark:text-[#b7b7b7]">The best performing packs uploaded within the last 3 weeks.</p>
            
                  <!-- <div class="swiper mt-5">
                  
                     <div class="swiper-wrapper flex -mx-3 myFirstTop">
                        
                     <?php if(isset($packs_trending)): ?>
                     <?php foreach($packs_trending as $pack): ?>
                        <div class="group swiper-slide w-1/6 shrink-0 focus:outline-none px-3">
                           <div class="relative overflow-hidden rounded bg-black bg-opacity-10">
                              <div class="pointer-events-none absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-40 text-white transition-opacity focus:outline-none group-hover:opacity-100 opacity-0">
                                 <button audio_id="<?=$pack['id']?>" class="pointer-events-auto rounded-full text-purple backdrop-blur-lg hover:text-lightpurple">
                                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16" data-v-e4982a0e>
                                       <g data-v-e4982a0e>
                                          <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" class="fill-current" data-v-e4982a0e></path>
                                          <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" fill="white" fill-opacity="0.16" data-v-e4982a0e></path>
                                          <path d="M46.1095 33.3202L24.4379 47.2891C23.2179 48.0754 21.6113 47.1996 21.6113 45.7481V17.8105C21.6113 16.359 23.2179 15.4831 24.4379 16.2695L46.1095 30.2383C47.2296 30.9603 47.2296 32.5983 46.1095 33.3202Z" fill="white" class="playicon" data-v-e4982a0e></path>
                                       </g>
                                    </svg>
                                 </button>
                              </div>
                              <span class="hidden"></span> <a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="block h-0 w-full bg-cover bg-center" style="padding-bottom:100%;background-image:url(<?=Yii::$app->request->baseUrl?>/modx/<?=$pack['img']?>);"></a>
                              <div class="absolute bottom-1 left-1 hidden items-center rounded-[5px] bg-black/[0.48] px-1 py-[5px] text-xs text-white backdrop-blur-lg sm:inline-flex myBlockFlex">
                                 <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.56164 1.53856C7.56164 1.02026 7.9818 0.600098 8.5001 0.600098C9.0184 0.600098 9.43856 1.02026 9.43856 1.53856V13.5386C9.43856 14.0569 9.0184 14.477 8.5001 14.477C7.9818 14.477 7.56164 14.0569 7.56164 13.5386V1.53856ZM14.0232 5.23087C14.0232 4.71257 14.4433 4.29241 14.9616 4.29241C15.4799 4.29241 15.9001 4.71257 15.9001 5.23087V9.84625C15.9001 10.3645 15.4799 10.7847 14.9616 10.7847C14.4433 10.7847 14.0232 10.3646 14.0232 9.84625V5.23087ZM4.33087 6.23087C4.33087 5.71257 4.75103 5.29241 5.26933 5.29241C5.78763 5.29241 6.20779 5.71257 6.20779 6.23087V8.84625C6.20779 9.36455 5.78763 9.78471 5.26933 9.78471C4.75103 9.78471 4.33087 9.36455 4.33087 8.84625V6.23087ZM10.7924 3.38471C10.7924 2.86642 11.2126 2.44625 11.7309 2.44625C12.2492 2.44625 12.6693 2.86642 12.6693 3.38471V11.6924C12.6693 12.2107 12.2492 12.6309 11.7309 12.6309C11.2126 12.6309 10.7924 12.2107 10.7924 11.6924V3.38471ZM1.1001 4.38471C1.1001 3.86642 1.52026 3.44625 2.03856 3.44625C2.55686 3.44625 2.97702 3.86642 2.97702 4.38471V10.6924C2.97702 11.2107 2.55686 11.6309 2.03856 11.6309C1.52026 11.6309 1.1001 11.2107 1.1001 10.6924V4.38471Z" class="fill-current"></path>
                                 </svg>
                                 <span class="ml-0.5 text-xs"><?=$pack['count_songs']?></span>
                                 <span class="price"> <?=$pack['price']?>&nbsp;$</span>
                              </div>
                           </div>
                           
                           <div class="mt-4 mymt4">

                         
                              <div class="absolute bottom-1 left-1 hidden items-center rounded-[5px] bg-black/[0.48] px-1 py-[5px] text-xs text-white backdrop-blur-lg sm:inline-flex myBlockFlex ">
                                 <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.56164 1.53856C7.56164 1.02026 7.9818 0.600098 8.5001 0.600098C9.0184 0.600098 9.43856 1.02026 9.43856 1.53856V13.5386C9.43856 14.0569 9.0184 14.477 8.5001 14.477C7.9818 14.477 7.56164 14.0569 7.56164 13.5386V1.53856ZM14.0232 5.23087C14.0232 4.71257 14.4433 4.29241 14.9616 4.29241C15.4799 4.29241 15.9001 4.71257 15.9001 5.23087V9.84625C15.9001 10.3645 15.4799 10.7847 14.9616 10.7847C14.4433 10.7847 14.0232 10.3646 14.0232 9.84625V5.23087ZM4.33087 6.23087C4.33087 5.71257 4.75103 5.29241 5.26933 5.29241C5.78763 5.29241 6.20779 5.71257 6.20779 6.23087V8.84625C6.20779 9.36455 5.78763 9.78471 5.26933 9.78471C4.75103 9.78471 4.33087 9.36455 4.33087 8.84625V6.23087ZM10.7924 3.38471C10.7924 2.86642 11.2126 2.44625 11.7309 2.44625C12.2492 2.44625 12.6693 2.86642 12.6693 3.38471V11.6924C12.6693 12.2107 12.2492 12.6309 11.7309 12.6309C11.2126 12.6309 10.7924 12.2107 10.7924 11.6924V3.38471ZM1.1001 4.38471C1.1001 3.86642 1.52026 3.44625 2.03856 3.44625C2.55686 3.44625 2.97702 3.86642 2.97702 4.38471V10.6924C2.97702 11.2107 2.55686 11.6309 2.03856 11.6309C1.52026 11.6309 1.1001 11.2107 1.1001 10.6924V4.38471Z" class="fill-current"></path>
                                 </svg>
                                 <span class="ml-0.5 text-xs"><?=$pack['count_songs']?></span>
                              </div>
   


                              <div class="truncate"><a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="text-[15px] font-medium leading-[18px] hover:underline"><?=$pack['title']?></a></div>
                              <div class="mt-2 flex">
                                 <div class="truncate pr-4 text-sm leading-[18px] text-5c5c5c dark:text-[#b7b7b7]">
                                    <a href="<?=Url::to(['site/creator'])?>/<?=$pack['creator_id']?>" class="hover:underline"><?=$pack['creator']?></a>
                                 </div>

                              </div>
                           </div>
                        </div>
                     <?php endforeach; ?>
                     <?php endif; ?>

                     </div>
                  </div> -->



                        
                  <div class="swiper mt-6">
                     <div class="swiper-wrapper">
                     <?php foreach ($packs_trending as $pack): ?>
                           <div class="swiper-slide">
                              <div class="group flex flex-col items-center text-center">
                                 

                                 <div class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100" style="width: 172px; height: 172px;">
                                 
                                    <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" 
                                       class="block h-full w-full bg-center bg-cover" 
                                       style="background-image: url('<?= Yii::$app->request->baseUrl ?>/modx/<?= $pack['img'] ?>');"></a>

                                    <div class="play-overlay">
                                    <button class="play-button" audio_id="<?= $pack['id'] ?>" data-audio="<?= $pack['id'] ?>" data-file="<?= $pack['audio_file'] ?>">
                                       <!-- Иконка Play -->
                                       <svg class="play-icon" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                          <polygon points="25,20 50,32 25,44" fill="white"></polygon>
                                       </svg>
                                       <!-- Иконка Stop -->
                                       <svg class="stop-icon hidden" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                          <rect x="24" y="24" width="16" height="16" fill="white"></rect>
                                       </svg>
                                    </button>
                                    </div>


                                 </div>


                                 <div class="mt-4">
                                    <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" class="font-medium hover:underline"><?= $pack['title'] ?></a>
                                    <p class="text-sm text-gray-500"><?= $pack['creator'] ?> | <?= $pack['count_songs'] ?> songs</p>
                                    <p class="text-green-600 font-semibold"><?= $pack['price'] ?> $</p>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                     </div>
                     
                     <div class="slider-prev">←</div>
                     <div class="slider-next">→</div>
                  </div> 
                        

                        







         </div>
         <div class="-mx-4 h-px bg-black/[0.12] dark:bg-white/[0.12] md:hidden"></div>
         <div class="overflow-hidden mt-10 pb-10 md:mt-24 md:pb-0">
            <div class="flex items-center">
               
               <div class="flex w-full items-center space-x-3 sm:w-auto">
                  <h2 class="text-xl font-medium leading-[18px] tracking-[-0.25px] sm:text-[28px] sm:leading-8">Genres</h2>

               </div>
               <div class="ml-auto hidden space-x-2.5 text-[0px] sm:block">
            
               </div>
            </div>
            <p class="mt-4 text-[15px] leading-[18px] text-5c5c5c dark:text-[#b7b7b7]">Discover curated samples sorted by moods, subgenres and artists. Updated daily.</p>
            
            
<!--             
            <div class="swiper mt-5">
               <div class="swiper-wrapper flex -mx-3 myFirstTop myGenre">
								 <?php if (isset($selections_g)):?>
                 <?php foreach ($selections_g as $selection):?>
                  <?php  
                  $checkPack = $myThis->getDatsPacks($this->context->num_genre($selection['genre'])); $flag='';
                                if (!$checkPack): $flag = 'none'; endif;
                                 ?>

                  <div style="display: <?php echo $flag; ?>" class="group relative overflow-hidden rounded-md border border-black/[0.12] dark:border-white/[0.12] swiper-slide w-1/6 shrink-0 focus:outline-none px-3">
                     <div class="absolute bottom-0 left-0 z-[1] flex w-full items-center p-3 sm:p-4" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.94) 71.35%)">
                        <div class="flex-1 truncate">
                           <a href="<?=Url::to(['site/samples'])?>?genres=<?=$this->context->num_genre($selection['genre'])?>" class="block truncate text-center text-sm font-bold tracking-[-0.2px] text-white sm:text-lg sm:!leading-6 "><?=$selection['genre']?></a>
                           <p class="mt-0.5 truncate text-center text-[11px] leading-[14px] tracking-[0.1px] text-white/[0.72] dark:text-white/50 sm:mt-1"><?=$selection['creators']?></p>
                        </div>
                     </div>
                     <a href="<?=Url::to(['site/samples'])?>?genres=<?=$this->context->num_genre($selection['genre'])?>" class="relative block h-0 w-full bg-cover bg-center pb-[84%] md:pb-[76%]" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.12), rgba(0, 0, 0, 0.12)), url(<?=Yii::$app->request->baseUrl?>/modx/<?=($selection['image']!="")?$selection['image']:'images/user_photo/user_icon.png'?>);"></a>
                     <div class="myFirstGenres pointer-events-none absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-40 text-white transition-opacity focus:outline-none group-hover:opacity-100 opacity-0">
                        <button audio_id="<?=$selection['audio_id']?>" class="pointer-events-auto -mt-4 rounded-full text-purple hover:text-lightpurple sm:-mt-8">
                           <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 sm:h-12 sm:w-12" data-v-e4982a0e>
                              <g data-v-e4982a0e>
                                 <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" class="fill-current" data-v-e4982a0e></path>
                                 <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" fill="white" fill-opacity="0.16" data-v-e4982a0e></path>
                                 <path d="M46.1095 33.3202L24.4379 47.2891C23.2179 48.0754 21.6113 47.1996 21.6113 45.7481V17.8105C21.6113 16.359 23.2179 15.4831 24.4379 16.2695L46.1095 30.2383C47.2296 30.9603 47.2296 32.5983 46.1095 33.3202Z" fill="white" class="playicon" data-v-e4982a0e></path>
                              </g>
                           </svg>
                           <span class="hidden"></span>
                        </button>
                     </div>
                  </div>
                 <?php endforeach; ?>
							 <?php endif; ?>
               </div>
            </div> -->







            <div class="swiper mt-6">
                     <div class="swiper-wrapper">
                     <?php foreach ($selections_g as $pack): ?>
                   
                        <?= $checkPack = $myThis->getDatsPacks($this->context->num_genre($selection['genre'])); $flag='';
                                if (!$checkPack): $flag = 'none'; endif; ?>
                               
                                <?php  if (!$checkPack): ?>
                         

                           <div class="swiper-slide" >
                              <div class="group flex flex-col items-center text-center">
                                 

                                 <div class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100" style="width: 172px; height: 172px;">
                                  
                                    <a href="<?= Url::to(['site/samples', 
                                     'genres' => $this->context->num_genre($pack['genre'])
                                    ]) ?>" 
                                       class="block h-full w-full bg-center bg-cover"
                                       style="background-image: url('<?=Yii::$app->request->baseUrl?>/modx/<?=($pack['image']!="")?$pack['image']:'images/user_photo/user_icon.png'?>');" 
                                       >
                                    </a>


                                    <div class="play-overlay">
                                 
                                    </div>


                                 </div>


                                 <div class="mt-4">
                        
                                    <a href="<?= Url::to(['site/samples', 
                                     'genres' =>  $this->context->num_genre($pack['genre'])
                                    ]) ?>" class="font-medium hover:underline">  <?=$pack['genre']?>                              
                                    </a>

                                 
                                 </div>
                              </div>
                           </div>
                           <?php endif;?>
                        <?php endforeach; ?>
                     </div>
                     
                     <div class="slider-prev">←</div>
                     <div class="slider-next">→</div>
                  </div> 
                        











         </div>
         <div class="-mx-4 h-px bg-black/[0.12] dark:bg-white/[0.12] md:hidden"></div>
         <div class="mt-10 md:mt-24">
            <div class="overflow-hidden pb-10 md:pb-0">
               <div class="flex items-center">
                  <div class="flex w-full items-center space-x-3 sm:w-auto">
                     <h2 class="text-xl font-medium leading-[18px] tracking-[-0.25px] sm:text-[28px] sm:leading-8">Most Popular</h2>

                  </div>
                  <div class="ml-auto hidden space-x-2.5 text-[0px] sm:block">
   
                  </div>
               </div>
               <p class="mt-4 text-[15px] leading-[18px] text-5c5c5c dark:text-[#b7b7b7]">The top performing packs over the last 90 days.</p>
                     
               
               
                     <!-- <div class="swiper mt-5">
                        <div class="swiper-wrapper flex -mx-3 myFirstTop">
                        <?php if(isset($packs_popular)): ?>
                        <?php foreach($packs_popular as $pack): ?>
                           <div class="group swiper-slide w-1/6 shrink-0 focus:outline-none px-3">
                              <div class="relative overflow-hidden rounded bg-black bg-opacity-10">
                                 <div class="pointer-events-none absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-40 text-white transition-opacity focus:outline-none group-hover:opacity-100 opacity-0">
                                    <button audio_id="<?=$pack['id']?>" class="pointer-events-auto rounded-full text-purple backdrop-blur-lg hover:text-lightpurple">
                                       <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16" data-v-e4982a0e>
                                          <g data-v-e4982a0e>
                                             <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" class="fill-current" data-v-e4982a0e></path>
                                             <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" fill="white" fill-opacity="0.16" data-v-e4982a0e></path>
                                             <path d="M46.1095 33.3202L24.4379 47.2891C23.2179 48.0754 21.6113 47.1996 21.6113 45.7481V17.8105C21.6113 16.359 23.2179 15.4831 24.4379 16.2695L46.1095 30.2383C47.2296 30.9603 47.2296 32.5983 46.1095 33.3202Z" fill="white" class="playicon" data-v-e4982a0e></path>
                                          </g>
                                       </svg>
                                    </button>
                                 </div>
                                 <span class="hidden"></span> <a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="block h-0 w-full bg-cover bg-center" style="padding-bottom:100%;background-image:url(<?=Yii::$app->request->baseUrl?>/modx/<?=$pack['img']?>);"></a>
                                 <div class="absolute bottom-1 left-1 hidden items-center rounded-[5px] bg-black/[0.48] px-1 py-[5px] text-xs text-white backdrop-blur-lg sm:inline-flex myBlockFlex">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7.56164 1.53856C7.56164 1.02026 7.9818 0.600098 8.5001 0.600098C9.0184 0.600098 9.43856 1.02026 9.43856 1.53856V13.5386C9.43856 14.0569 9.0184 14.477 8.5001 14.477C7.9818 14.477 7.56164 14.0569 7.56164 13.5386V1.53856ZM14.0232 5.23087C14.0232 4.71257 14.4433 4.29241 14.9616 4.29241C15.4799 4.29241 15.9001 4.71257 15.9001 5.23087V9.84625C15.9001 10.3645 15.4799 10.7847 14.9616 10.7847C14.4433 10.7847 14.0232 10.3646 14.0232 9.84625V5.23087ZM4.33087 6.23087C4.33087 5.71257 4.75103 5.29241 5.26933 5.29241C5.78763 5.29241 6.20779 5.71257 6.20779 6.23087V8.84625C6.20779 9.36455 5.78763 9.78471 5.26933 9.78471C4.75103 9.78471 4.33087 9.36455 4.33087 8.84625V6.23087ZM10.7924 3.38471C10.7924 2.86642 11.2126 2.44625 11.7309 2.44625C12.2492 2.44625 12.6693 2.86642 12.6693 3.38471V11.6924C12.6693 12.2107 12.2492 12.6309 11.7309 12.6309C11.2126 12.6309 10.7924 12.2107 10.7924 11.6924V3.38471ZM1.1001 4.38471C1.1001 3.86642 1.52026 3.44625 2.03856 3.44625C2.55686 3.44625 2.97702 3.86642 2.97702 4.38471V10.6924C2.97702 11.2107 2.55686 11.6309 2.03856 11.6309C1.52026 11.6309 1.1001 11.2107 1.1001 10.6924V4.38471Z" class="fill-current"></path>
                                    </svg>
                                    <span class="ml-0.5 text-xs"><?=$pack['count_songs']?></span>
                                    <span class="price"><?php    $pricePack = $this->context->pack_info($pack['id'])['price']; echo  " ". $pricePack ." $"; ?></span>
                                 </div>
                              </div>
                              <div class="mt-4 mymt4">
                                 
                              <div class="absolute bottom-1 left-1 hidden items-center rounded-[5px] bg-black/[0.48] px-1 py-[5px] text-xs text-white backdrop-blur-lg sm:inline-flex myBlockFlex myBlockFlexDop">
                                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7.56164 1.53856C7.56164 1.02026 7.9818 0.600098 8.5001 0.600098C9.0184 0.600098 9.43856 1.02026 9.43856 1.53856V13.5386C9.43856 14.0569 9.0184 14.477 8.5001 14.477C7.9818 14.477 7.56164 14.0569 7.56164 13.5386V1.53856ZM14.0232 5.23087C14.0232 4.71257 14.4433 4.29241 14.9616 4.29241C15.4799 4.29241 15.9001 4.71257 15.9001 5.23087V9.84625C15.9001 10.3645 15.4799 10.7847 14.9616 10.7847C14.4433 10.7847 14.0232 10.3646 14.0232 9.84625V5.23087ZM4.33087 6.23087C4.33087 5.71257 4.75103 5.29241 5.26933 5.29241C5.78763 5.29241 6.20779 5.71257 6.20779 6.23087V8.84625C6.20779 9.36455 5.78763 9.78471 5.26933 9.78471C4.75103 9.78471 4.33087 9.36455 4.33087 8.84625V6.23087ZM10.7924 3.38471C10.7924 2.86642 11.2126 2.44625 11.7309 2.44625C12.2492 2.44625 12.6693 2.86642 12.6693 3.38471V11.6924C12.6693 12.2107 12.2492 12.6309 11.7309 12.6309C11.2126 12.6309 10.7924 12.2107 10.7924 11.6924V3.38471ZM1.1001 4.38471C1.1001 3.86642 1.52026 3.44625 2.03856 3.44625C2.55686 3.44625 2.97702 3.86642 2.97702 4.38471V10.6924C2.97702 11.2107 2.55686 11.6309 2.03856 11.6309C1.52026 11.6309 1.1001 11.2107 1.1001 10.6924V4.38471Z" class="fill-current"></path>
                                    </svg>
                                    <span class="ml-0.5 text-xs"><?=$pack['count_songs']?></span>
                                    <span class="price"><?php    $pricePack = $this->context->pack_info($pack['id'])['price']; echo  " ". $pricePack ." $"; ?></span>
                                 </div>
                                 

                                 <div class="truncate"><a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="text-[15px] font-medium leading-[18px] hover:underline"><?=$pack['title']?></a></div>
                                 <div class="mt-2 flex">
                                    <div class="truncate pr-4 text-sm leading-[18px] text-5c5c5c dark:text-[#b7b7b7]">
                                       <a href="<?=Url::to(['site/creator'])?>/<?=$pack['creator_id']?>" class="hover:underline"><?=$pack['creator']?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                        </div>
                     </div> -->



                     <div class="swiper mt-6">
                     <div class="swiper-wrapper">
                     <?php if(isset($packs_popular)): ?>
                     <?php foreach ($packs_popular as $pack): ?>
                           <div class="swiper-slide">
                              <div class="group flex flex-col items-center text-center">
                                 

                                 <div class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100" style="width: 172px; height: 172px;">
                                 
                                    <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" 
                                       class="block h-full w-full bg-center bg-cover" 
                                       style="background-image: url('<?= Yii::$app->request->baseUrl ?>/modx/<?= $pack['img'] ?>');"></a>

                                    <div class="play-overlay">
                                    <button class="play-button" audio_id="<?= $pack['id'] ?>" data-audio="<?= $pack['id'] ?>" data-file="<?= $pack['audio_file'] ?>">
                                       <!-- Иконка Play -->
                                       <svg class="play-icon" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                          <polygon points="25,20 50,32 25,44" fill="white"></polygon>
                                       </svg>
                                       <!-- Иконка Stop -->
                                       <svg class="stop-icon hidden" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                          <rect x="24" y="24" width="16" height="16" fill="white"></rect>
                                       </svg>
                                    </button>
                                    </div>


                                 </div>


                                 <div class="mt-4">
                                    <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" class="font-medium hover:underline"><?= $pack['title'] ?></a>
                                    <p class="text-sm text-gray-500"><?= $pack['creator'] ?> | <?= $pack['count_songs'] ?> songs</p>
                                    <p class="text-green-600 font-semibold"><?= $pack['price'] ?> $</p>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     
                     <div class="slider-prev">←</div>
                     <div class="slider-next">→</div>
                  </div> 





            </div>
         </div>
         <div class="-mx-4 h-px bg-black/[0.12] dark:bg-white/[0.12] md:hidden"></div>


         <div class="-mx-4 h-px bg-black/[0.12] dark:bg-white/[0.12] md:hidden"></div>
        
         <div class="-mx-4 h-px bg-black/[0.12] dark:bg-white/[0.12] md:hidden"></div>
         <div ḍ="" class="overflow-hidden mt-10 pb-10 md:mt-24 md:pb-0">
            <div class="flex items-center">
               <div class="flex w-full items-center space-x-3 sm:w-auto">
                  <h2 class="text-xl font-medium leading-[18px] tracking-[-0.25px] sm:text-[28px] sm:leading-8">Recommended for you</h2>

               </div>
               <div class="ml-auto hidden space-x-2.5 text-[0px] sm:block">
   
               </div>
            </div>

            
            <!-- <div class="swiper mt-5">
               <div class="swiper-wrapper flex -mx-3 myFirstTop">

                 <?php foreach($packs_hidden_gems as $pack): ?>
                  <div class="group swiper-slide w-1/6 shrink-0 focus:outline-none px-3">
                     <div class="relative overflow-hidden rounded bg-black bg-opacity-10">
                        <div class="pointer-events-none absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-40 text-white transition-opacity focus:outline-none group-hover:opacity-100 opacity-0">
                           <button audio_id="<?=$pack['id']?>" class="pointer-events-auto rounded-full text-purple backdrop-blur-lg hover:text-lightpurple">
                              <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16" data-v-e4982a0e>
                                 <g data-v-e4982a0e>
                                    <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" class="fill-current" data-v-e4982a0e></path>
                                    <path d="M0 32C0 14.3269 14.3269 0 32 0C49.6731 0 64 14.3269 64 32C64 49.6731 49.6731 64 32 64C14.3269 64 0 49.6731 0 32Z" fill="white" fill-opacity="0.16" data-v-e4982a0e></path>
                                    <path d="M46.1095 33.3202L24.4379 47.2891C23.2179 48.0754 21.6113 47.1996 21.6113 45.7481V17.8105C21.6113 16.359 23.2179 15.4831 24.4379 16.2695L46.1095 30.2383C47.2296 30.9603 47.2296 32.5983 46.1095 33.3202Z" fill="white" class="playicon" data-v-e4982a0e></path>
                                 </g>
                              </svg>
                           </button>
                        </div>
                        <span class="hidden"></span> <a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="block h-0 w-full bg-cover bg-center" style="padding-bottom:100%;background-image:url(<?=Yii::$app->request->baseUrl?>/modx/<?=$pack['img']?>);"></a>
                        <div class="absolute bottom-1 left-1 hidden items-center rounded-[5px] bg-black/[0.48] px-1 py-[5px] text-xs text-white backdrop-blur-lg sm:inline-flex myBlockFlex">
                           <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.56164 1.53856C7.56164 1.02026 7.9818 0.600098 8.5001 0.600098C9.0184 0.600098 9.43856 1.02026 9.43856 1.53856V13.5386C9.43856 14.0569 9.0184 14.477 8.5001 14.477C7.9818 14.477 7.56164 14.0569 7.56164 13.5386V1.53856ZM14.0232 5.23087C14.0232 4.71257 14.4433 4.29241 14.9616 4.29241C15.4799 4.29241 15.9001 4.71257 15.9001 5.23087V9.84625C15.9001 10.3645 15.4799 10.7847 14.9616 10.7847C14.4433 10.7847 14.0232 10.3646 14.0232 9.84625V5.23087ZM4.33087 6.23087C4.33087 5.71257 4.75103 5.29241 5.26933 5.29241C5.78763 5.29241 6.20779 5.71257 6.20779 6.23087V8.84625C6.20779 9.36455 5.78763 9.78471 5.26933 9.78471C4.75103 9.78471 4.33087 9.36455 4.33087 8.84625V6.23087ZM10.7924 3.38471C10.7924 2.86642 11.2126 2.44625 11.7309 2.44625C12.2492 2.44625 12.6693 2.86642 12.6693 3.38471V11.6924C12.6693 12.2107 12.2492 12.6309 11.7309 12.6309C11.2126 12.6309 10.7924 12.2107 10.7924 11.6924V3.38471ZM1.1001 4.38471C1.1001 3.86642 1.52026 3.44625 2.03856 3.44625C2.55686 3.44625 2.97702 3.86642 2.97702 4.38471V10.6924C2.97702 11.2107 2.55686 11.6309 2.03856 11.6309C1.52026 11.6309 1.1001 11.2107 1.1001 10.6924V4.38471Z" class="fill-current"></path>
                           </svg>
                           <span class="ml-0.5 text-xs"><?=$pack['count_songs']?></span>
                           <span class="price"><?php    $pricePack = $this->context->pack_info($pack['id'])['price']; echo  " ". $pricePack ." $"; ?></span>
                        </div>
                     </div>
                     <div class="mt-4 mymt4">
                       
                     <div class="absolute bottom-1 left-1 hidden items-center rounded-[5px] bg-black/[0.48] px-1 py-[5px] text-xs text-white backdrop-blur-lg sm:inline-flex myBlockFlex myBlockFlexDop">
                           <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M7.56164 1.53856C7.56164 1.02026 7.9818 0.600098 8.5001 0.600098C9.0184 0.600098 9.43856 1.02026 9.43856 1.53856V13.5386C9.43856 14.0569 9.0184 14.477 8.5001 14.477C7.9818 14.477 7.56164 14.0569 7.56164 13.5386V1.53856ZM14.0232 5.23087C14.0232 4.71257 14.4433 4.29241 14.9616 4.29241C15.4799 4.29241 15.9001 4.71257 15.9001 5.23087V9.84625C15.9001 10.3645 15.4799 10.7847 14.9616 10.7847C14.4433 10.7847 14.0232 10.3646 14.0232 9.84625V5.23087ZM4.33087 6.23087C4.33087 5.71257 4.75103 5.29241 5.26933 5.29241C5.78763 5.29241 6.20779 5.71257 6.20779 6.23087V8.84625C6.20779 9.36455 5.78763 9.78471 5.26933 9.78471C4.75103 9.78471 4.33087 9.36455 4.33087 8.84625V6.23087ZM10.7924 3.38471C10.7924 2.86642 11.2126 2.44625 11.7309 2.44625C12.2492 2.44625 12.6693 2.86642 12.6693 3.38471V11.6924C12.6693 12.2107 12.2492 12.6309 11.7309 12.6309C11.2126 12.6309 10.7924 12.2107 10.7924 11.6924V3.38471ZM1.1001 4.38471C1.1001 3.86642 1.52026 3.44625 2.03856 3.44625C2.55686 3.44625 2.97702 3.86642 2.97702 4.38471V10.6924C2.97702 11.2107 2.55686 11.6309 2.03856 11.6309C1.52026 11.6309 1.1001 11.2107 1.1001 10.6924V4.38471Z" class="fill-current"></path>
                           </svg>
                           <span class="ml-0.5 text-xs"><?=$pack['count_songs']?></span>
                           <span class="price"><?php    $pricePack = $this->context->pack_info($pack['id'])['price']; echo  " ". $pricePack ." $"; ?></span>
                        </div>


                        <div class="truncate"><a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="text-[15px] font-medium leading-[18px] hover:underline myFontWhite"><?=$pack['title']?></a></div>
                        <div class="mt-2 flex">
                           <div class="truncate pr-4 text-sm leading-[18px] text-5c5c5c dark:text-[#b7b7b7]">
                              <a href="<?=Url::to(['site/creator'])?>/<?=$pack['creator_id']?>" class="hover:underline"><?=$pack['creator']?></a>
                           </div>
                        </div>
                     </div>
                  </div>
                <?php endforeach; ?>

               </div>
            </div> -->

            <div class="swiper mt-6">
                     <div class="swiper-wrapper">
                     <?php if(isset($packs_hidden_gems)): ?>
                     <?php foreach ($packs_hidden_gems as $pack): ?>
                           <div class="swiper-slide">
                              <div class="group flex flex-col items-center text-center">
                                 

                                 <div class="relative w-full aspect-square rounded-lg overflow-hidden bg-gray-100" style="width: 172px; height: 172px;">
                                 
                                    <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" 
                                       class="block h-full w-full bg-center bg-cover" 
                                       style="background-image: url('<?= Yii::$app->request->baseUrl ?>/modx/<?= $pack['img'] ?>');"></a>

                                    <div class="play-overlay">
                                    <button class="play-button" audio_id="<?= $pack['id'] ?>" data-audio="<?= $pack['id'] ?>" data-file="<?= $pack['audio_file'] ?>">
                                       <!-- Иконка Play -->
                                       <svg class="play-icon" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                          <polygon points="25,20 50,32 25,44" fill="white"></polygon>
                                       </svg>
                                       <!-- Иконка Stop -->
                                       <svg class="stop-icon hidden" width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="32" cy="32" r="32" class="fill-current text-purple"></circle>
                                          <rect x="24" y="24" width="16" height="16" fill="white"></rect>
                                       </svg>
                                    </button>
                                    </div>


                                 </div>


                                 <div class="mt-4">
                                    <a href="<?= Url::to(['site/pack', 'id' => $pack['id']]) ?>" class="font-medium hover:underline"><?= $pack['title'] ?></a>
                                    <p class="text-sm text-gray-500"><?= $pack['creator'] ?> | <?= $pack['count_songs'] ?> songs</p>
                                    <p class="text-green-600 font-semibold"><?= $pack['price'] ?> $</p>
                                 </div>
                              </div>
                           </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                     </div>
                     
                     <div class="slider-prev">←</div>
                     <div class="slider-next">→</div>
                  </div> 


         </div>
         <div class="mt-10 text-center md:mt-14">
           <button id="toTop" data-v-b2a31b8e="" class="btn-white-outline inline-flex items-baseline space-x-2.5 pr-[14px]">
              <span data-v-b2a31b8e="">Back to top</span>
              <svg data-v-b2a31b8e="" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="-rotate-90 transform">
                 <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                 <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
              </svg>
           </button>
         </div>
      </div>
   </div>
 </div>



<?php

$csrfToken = Yii::$app->request->getCsrfToken();

$script = <<< JS

let base_url = "https://vintapes.com";
let wave2 = {};//аудиодоріжкі

//url2 = '';   

$( ".waveform2" ).each(function() {
   var audio_id = $( this ).attr("audio_id");
    var id = $( this ).attr("id");

    $.ajax({
        method: "POST",
        url: base_url+"/ajax/audio_pack",
        data: { audio_id: audio_id}
      })
      .done(function( rez ) {
           var url2 = encodeURI(base_url + rez);
           wave2[audio_id] = WaveSurfer.create({
                container: '#'+id,
                waveColor: '#bdc3c7',
                progressColor: '#6F7375',
                cursorWidth: 0,
                barHeight: 1.4,
                barWidth: 2,
                barGap: 2,
                fillParent: true,
                hideScrollbar: true,
                loopSelection: false,
                height:60
                });
            wave2[audio_id].load(url2);
      });    
});



//плей маин слайдер



$(".play-btn").click(function () {
  const audioId = $(this).attr('audio_id');
  const audio = new Audio();

  $.ajax({
    method: "POST",
    url: base_url+"/ajax/audio_pack",
    data: { audio_id: audioId, "_csrf": csrfToken },
  })
    .done(function (response) {
      const result = JSON.parse(response);
      if (result.url) {
        audio.src = result.url;
        audio.play().catch(error => {
          console.error('Ошибка воспроизведения:', error.message);
        });
      } else {
        console.error('Ошибка: URL не найден');
      }
    })
    .fail(function () {
      console.error('Ошибка AJAX-запроса');
    });
});


JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>
<link rel="stylesheet" href="css/explore.css">


<!-- Подключение стилей Swiper -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

<!-- Подключение скриптов Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>


const swiper = new Swiper('.swiper', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    navigation: {
        nextEl: '.slider-next',
        prevEl: '.slider-prev',
    },
    loop: true,
    autoHeight: true,
    observer: true, // Наблюдатель за изменениями DOM
    observeParents: true, // Отслеживание изменений в родительских элементах
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 15,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});
</script>
<link rel="stylesheet" href="/css/exp_button.css">
<link rel="stylesheet" href="/css/exp_main.css">
<script src="/js/exp_main.js"></script>

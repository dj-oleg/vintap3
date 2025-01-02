<!DOCTYPE html>
<?php

/** @var yii\web\View $this */
/** @var string $content */

//use Yii;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Url;
//use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use app\models\User;
//use yii\bootstrap5\Nav;
//use yii\bootstrap5\NavBar;
$session = Yii::$app->session;
$session->open();
if(Yii::$app->controller->action->id != 'cart'){$session['__myreturnUrl'] = '';}
$carrent_theme=$session['theme'];
echo '<div style="color:white">';
//echo2($_SESSION);

//echo2($session['cart']);
$session->close();
echo '</div>';
//echo3(Yii::$app->user->identity->id);
if(!Yii::$app->user->isGuest) $user=User::findOne(['id' => Yii::$app->user->id]);
$request = Yii::$app->request;
$type=$request->get('type');
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
//$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '@web/favicon.ico']);
$promo=$this->context->get_promo();
//echo3($promo);

//google authorization
$client_id="42585020892-h0dka680rn0psjcmpf2k8sancr39g8q3.apps.googleusercontent.com";
$clientSecret="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";
$redirect_uri = 'https://vintapes.com/user/google';
$url = 'https://accounts.google.com/o/oauth2/auth';
$params_g = array(
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'client_id'     => $client_id,
    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
);
?>
<?php $this->beginPage() ?>


<!--<html lang="<?= Yii::$app->language ?>" data-n-head="%7B%22lang%22:%7B%22ssr%22:%22en-US%22%7D%7D" class="dark">-->
<html data-n-head-ssr lang="en-US" data-n-head="%7B%22lang%22:%7B%22ssr%22:%22en-US%22%7D%7D" class="<?=$carrent_theme=="Light"?"":"dark"?>">

<head>

    <title><?= Html::encode($this->title) ?></title>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <!--<meta data-n-head="ssr" data-hid="description" name="description" content="Discover sounds uploaded by musicians and creators from around the world.">-->
    <meta data-n-head="ssr" data-hid="og:locale" property="og:locale" content="en_US">
    <meta data-n-head="ssr" data-hid="og:type" property="og:type" content="website">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="Buy &amp; Sell High Quality Loops, Samples and Packs | vintapes.com">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Discover sounds uploaded by musicians and creators from around the world.">
    <meta data-n-head="ssr" data-hid="og:site_name" property="og:site_name" content="vintapes.com">
    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="<?=Yii::$app->request->baseUrl?>/img/social.png">
    <meta data-n-head="ssr" data-hid="og:image:secure_url" property="og:image:secure_url" content="<?=Yii::$app->request->baseUrl?>/img/social.png">
    <meta data-n-head="ssr" data-hid="og:image:width" property="og:image:width" content="1200">
    <meta data-n-head="ssr" data-hid="og:image:height" property="og:image:height" content="630">
    <meta data-n-head="ssr" data-hid="twitter:card" name="twitter:card" content="summary_large_image">
    <meta data-n-head="ssr" data-hid="twitter:title" name="twitter:title" content="Buy &amp; Sell High Quality Loops, Samples and Packs | vintapes.com">
    <meta data-n-head="ssr" data-hid="twitter:description" name="twitter:description" content="Discover sounds uploaded by musicians and creators from around the world.">
    <meta data-n-head="ssr" data-hid="twitter:image" name="twitter:image" content="<?=Yii::$app->request->baseUrl?>/img/social.png">
    <meta data-n-head="ssr" name="msapplication-TileColor" content="#ffffff">
    <meta data-n-head="ssr" name="theme-color" content="#ffffff">
    <meta data-n-head="ssr" data-hid="og:url" property="og:url" content="<?=Yii::$app->request->baseUrl?>">
    <link data-n-head="ssr" rel="apple-touch-icon" sizes="180x180" href="<?=Yii::$app->request->baseUrl?>/img/apple-touch-icon.png">
    <link data-n-head="ssr" rel="icon" type="image/png" sizes="32x32" href="<?=Yii::$app->request->baseUrl?>/img/favicon-32x32.png">
    <link data-n-head="ssr" rel="icon" type="image/png" sizes="16x16" href="<?=Yii::$app->request->baseUrl?>/img/favicon-16x16.png">
    <link data-n-head="ssr" rel="manifest" href="site.webmanifest">
    <link data-n-head="ssr" rel="mask-icon" href="safari-pinned-tab.svg" color="#0024ff">
    <script data-n-head="ssr" src="<?=Yii::$app->request->baseUrl?>/js/color-thief.umd.js"></script>
    <script src="<?=Yii::$app->request->baseUrl?>/js/wavesurfer.js"></script>
    <meta name="facebook-domain-verification" content="q2ba5w3fag5agb0hvkgn7xlpgg0418" />
    <style>
.truncate a{
    /*color: white !important;*/
}

.swiper-button-next::after, .swiper-button-prev::after{
    font-size: 19px !important;
}
.sticky-nav{
    z-index: 50 !important;
}
.user-menu>div{
    z-index: 50 !important;
}
.btn-purple {
    font-family: oswald_f !important;
    font-weight: normal !important;
    color: white !important;
    /*margin-bottom: -2px;*/
}
.dark .dark\:bg-black{
    background-color:#212529 !important;

}



.ms-bg-white{
    background-image: linear-gradient(#f7ac10 5%, 30%, #fff 90%);
    color: black;
}
.dark .dark\:ms-bg-black{
    background-image: linear-gradient(#f7ac10 5%, 30%, #212529 90%);
    color: white;
}
.btn-white2{
    border: 1px solid #b7b7b7;
    font-weight: normal !important;
}


@media (min-width:320){

    .swiper-button-next::after, .swiper-button-prev::after{
        font-size: 19px !important;
    }

}



@media(min-width:320px) and (max-width:440px){
    .tw-logo-wrap{
        display: grid !important;
        grid-template-rows: 50% 50%;
        grid-template-columns: 50% 50%;
    }

    .swiper-button-next,
    .swiper-button-prev {
        top:31% !important;
    }

    /* .myBottom h2 */

    .tw-logo-wrap>.tw-dark-mode-switch{
        margin-top: 10%;
    }
}


@media(min-width:441px) and (max-width:775px){
    .swiper-button-next,
    .swiper-button-prev {
        top:41% !important;
    }


    .tw-logo-wrap>.tw-dark-mode-switch{
        margin-top: 2%;
    }

}


@media(min-width:776px){
    .myWrap{
        display: flex;
        flex-direction: row !important;
        justify-content: space-between !important;
        width: 30% !important;
    }
    .myWrap>.tw-dark-mode-switch{
        padding-top: 2%;
    }
}

@media(max-width:320px) {
    .xs_hidden{
        display:none !important;
    }
    .md\:text-xs{font-size:14px !important}
    .rounded {
        width:70px !important;
        height:70px !important
    }
    .swiper-wrapper{
        overflow-x: auto;
    }
    .swiper-slide{
        min-width:100px;
        margin:0 0px;
    }
    .swiper-slide>.rounded {
        width:100px !important;
        height:100px !important
    }
}

.waveimgwhite{
    filter: invert(100%);
    -webkit-filter: invert(100%);
    -moz-filter: invert(100%);
    -o-filter: invert(100%);
    -ms-filter: invert(100%);
}
.dark .dark\:waveimg{
    filter: invert(0%);
    -webkit-filter: invert(0%);
    -moz-filter: invert(0%);
    -o-filter: invert(0%);
    -ms-filter: invert(0%);
}

        /* new style */



@media(min-width: 761px) and (max-width: 1200px){
    .myTestleftImg{
        width: 50%;
    }


    .myBottomBot{
        /*padding-left: 50%;*/
        /*background: none ;*/

    }
    .myTop{
        margin-left: 60% !important;
        padding-top: 64px !important;
    }
    .myBottom{
        margin-left: 2%;
        padding-left: 2%;
        background: none ;
        margin-top: -39.5% !important;
        height: 372px !important;

    }
    .myBottomBot p{
        /*height: 100px;*/
        /*overflow: hidden;*/
    }

}


@media (max-width:760px){


}
.myBottom h2{
    width:100% !important;
}


.myTop img{
    width:100%;
}
.myTop{
    padding-left:0px !important;
    height:400px;

}

@media(min-width:320px) and (max-width:460px){


    .myItemFlex li a{
        display: flex !important;
    }

    .items-center > .user_avatar{
        display: none !important;
    }


    .fa-layers{
        margin-top: 37%;
    }
    .rounded-full{
        display: none !important;
    }


    /* new mystyles   */
    .myBottomBot{
        display: none !important;
        font-size: 0;

    }
    .BottomFlex{
        justify-content: center;

    }
    .btn-white2{
        font-size:19px;
    }
    .BottomFlex{
        margin-top: 4px !important;
    }

}
@media(min-width: 461px) and (max-width: 650px){
    .BottomFlex{
        justify-content: center;
    }
    .BottomFlex{
        justify-content: center;
    }
}

    </style>

    <!-- parth 2   -->
    <!---Slaider------------------------------------------------------------------------->
    <style>
.main-slader{min-height:379px;}
.ms-bg-white{
    background-image: linear-gradient(#fff 5%, 30%, #fff 90%);
}

.dark .dark\:ms-bg-black {
    background-image: linear-gradient(#212529 5%, 30%, #212529 90%);
}
@media(max-width:450px) {
    .img-slider {
        margin:0px;
        padding:5px;
        width: 100%;
        height:auto;
    }
}

/* my style */

.dark .dark\:colBlack{
    color:white !important;

}


@media(min-width:320px) and (max-width:460px){
    .myBottom{
        height:230px !important;
        overflow: hidden;
    }
    .myBottomBot{

        overflow: hidden;
        height: 150px;
    }
}

.overlay {
    display: flex;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s linear, visibility 0.3s linear;

    }
.overlay.show {
    opacity: 1;
    visibility: visible;
    }

    </style>
    <!-- end  parth 2   -->



    <?php $this->head() ?>

</head>
<body class="samples-page" data-n-head="%7B%22class%22:%7B%22ssr%22:%22samples-page%22%7D%7D">
<?php $this->beginBody() ?>



<div data-server-rendered="true" id="__nuxt">
    <!---->

    <div id="__layout">
        <div class="bg-white font-circular-std text-sm font-normal text-black antialiased dark:bg-121212 dark:text-white explore-page <?=(isset($promo))?'pt-9':''?>" style="margin-top:-37px"><!--pt-9-->
            <?php if (isset($promo)):?>
                <a href="<?=Url::to(['site/page','alias'=>$promo->alias])?>" class="group  top-0 z-40 flex w-full items-center justify-center space-x-2.5 bg-f05025 p-[9px] text-xs font-medium leading-[18px] tracking-[-0.05px] text-white transition-colors duration-200 hover:bg-[#2bfcca] hover:text-black sm:text-sm">
                    <span><?=$promo->description?></span>
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-transform duration-300 group-hover:translate-x-1.5">
                        <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                        <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
                    </svg>
                </a>
            <?php endif; ?>

            <!--   menu             -->
            <div class="sticky top-0 z-[38] border-b border-black/[0.08] bg-white pt-3 pb-2.5 dark:border-white/[0.08] dark:bg-black dark:text-white lg:border-[#c4c4c4]/20 lg:pb-0 " data-v-1fee5f17
            ><!--top-9-->
                <div class="box-small" data-v-1fee5f17>
                    <div class="flex items-center" data-v-1fee5f17>

                        <div class="hamburger-icon w-12 shrink-0 text-left lg:hidden" data-v-1fee5f17>
                            <button class="mobile-menu-btn align-middle" data-v-1fee5f17>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8" data-v-1fee5f17>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.40039 7.19986C2.40039 6.73594 2.77647 6.35986 3.24039 6.35986H20.7604C21.2243 6.35986 21.6004 6.73594 21.6004 7.19986C21.6004 7.66378 21.2243 8.03986 20.7604 8.03986H3.24039C2.77647 8.03986 2.40039 7.66378 2.40039 7.19986Z" class="fill-current"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.40039 11.9999C2.40039 11.5359 2.77647 11.1599 3.24039 11.1599H20.7604C21.2243 11.1599 21.6004 11.5359 21.6004 11.9999C21.6004 12.4638 21.2243 12.8399 20.7604 12.8399H3.24039C2.77647 12.8399 2.40039 12.4638 2.40039 11.9999Z" class="fill-current"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.40039 16.7999C2.40039 16.3359 2.77647 15.9599 3.24039 15.9599H20.7604C21.2243 15.9599 21.6004 16.3359 21.6004 16.7999C21.6004 17.2638 21.2243 17.6399 20.7604 17.6399H3.24039C2.77647 17.6399 2.40039 17.2638 2.40039 16.7999Z" class="fill-current"></path>
                                </svg>
                            </button>
                        </div>


                        <div class="flex items-center" data-v-1fee5f17>
                            <a href="/" class="shrink-0 lg:ml-0 nuxt-link-active ml-auto"><img id="headimg" src="<?=Yii::$app->request->baseUrl?>/img/logo_name<?=$carrent_theme=="Light"?"":"_white"?>.png" class="w-20 lg:w-24" ></a>
                        
                            <div class="ml-6 hidden w-full lg:block" data-v-1fee5f17>
                                <form class="" action="<?=Url::to(['site/search'])?>" data-v-1fee5f17>
                                    <input name="search" type="text" autocomplete="off" placeholder="Search samples or packs..." value="" class="form-field h-10 rounded-full border-2 border-black/[0.16] p-0 py-[15px] pl-[22px] pr-20 text-[15px] placeholder:text-5c5c5c focus:border-purple dark:border-white/[0.16] dark:bg-[#242424] dark:text-white dark:placeholder:text-[#b7b7b7] dark:focus:border-[#f05025] md:w-[348px]" data-v-1fee5f17>
                                    <button type="button" class="absolute right-[57px] top-1/2 z-10 w-[18px] -translate-y-1/2 cursor-pointer text-[#b7b7b7]" style="display:none;" data-v-1fee5f17>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5" data-v-1fee5f17>
                                            <path d="M14.8482 7.19779C15.1737 7.52323 15.1737 8.05087 14.8482 8.3763L13.2153 10.0093L14.8482 11.6422C15.1737 11.9677 15.1737 12.4953 14.8482 12.8207C14.5228 13.1462 13.9952 13.1462 13.6697 12.8207L12.0368 11.1878L10.4038 12.8207C10.0784 13.1462 9.55072 13.1462 9.22528 12.8207C8.89984 12.4953 8.89984 11.9677 9.22528 11.6422L10.8582 10.0093L9.22528 8.3763C8.89984 8.05087 8.89984 7.52323 9.22528 7.19779C9.55072 6.87236 10.0784 6.87236 10.4038 7.19779L12.0368 8.83076L13.6697 7.19779C13.9952 6.87236 14.5228 6.87236 14.8482 7.19779Z" class="fill-current"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.22438 3.53458C6.38262 3.35373 6.61122 3.25 6.85153 3.25H16.4812C17.0951 3.25 17.6839 3.49388 18.118 3.92799C18.5521 4.36211 18.796 4.95089 18.796 5.56481V14.4537C18.796 15.0676 18.5521 15.6564 18.118 16.0905C17.6839 16.5246 17.0951 16.7685 16.4812 16.7685H6.85153C6.61122 16.7685 6.38262 16.6648 6.22438 16.4839L1.03919 10.558C0.764279 10.2438 0.764279 9.77469 1.03919 9.46051L6.22438 3.53458ZM7.22967 4.91667L2.77365 10.0093L7.22967 15.1019H16.4812C16.6531 15.1019 16.8179 15.0336 16.9395 14.912C17.061 14.7905 17.1293 14.6256 17.1293 14.4537V5.56481C17.1293 5.39292 17.061 5.22806 16.9395 5.1065C16.8179 4.98495 16.6531 4.91667 16.4812 4.91667H7.22967Z" class="fill-current"></path>
                                        </svg>
                                    </button>
                
                                </form>
                            </div>
                        </div>

                        <div class="ml-auto shrink-0 lg:w-auto" data-v-1fee5f17>
                            <?php  //var_dump(Yii::$app->user);  ?>
                            <?php if(Yii::$app->user->isGuest):?>
                                <div class="flex items-center justify-end space-x-5 lg:space-x-3" data-v-1fee5f17>
                                    <button class="show_modal_sign_in btn_sign_in rounded-full py-[11px] text-[15px] font-medium leading-[18px] text-[#111111] hover:opacity-70 dark:text-white lg:bg-black/[0.06] lg:px-5 dark:lg:bg-white/[0.16]" data-v-1fee5f17>
                                        Sign in
                                    </button>
                                    <button class="show_modal_sign_in btn-purple hidden items-baseline space-x-2.5 pr-[14px] lg:inline-flex" data-v-1fee5f17>
                                        <span class="show_modal_sign_in btn_create_account" data-v-1fee5f17>Try free</span>
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-1fee5f17>
                                            <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                                            <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </div>
                                
                               <a href="<?=Url::to(['cart/cart'])?>" class="lg:hidden shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple" style="<?=(Yii::$app->controller->action->id == 'cart')?"border-bottom-color: rgb(85 43 252);":""?>">
                                <span class="fa-layers fa-fw fa-xl" style="--fa-beat-scale: 3.0;--fa-animation-duration: 2s;">
                                    <i class="fa-solid fa-cart-shopping" ></i>
                                    <span class="fa-layers-counter fa-2x" style=""><?=(isset($session['cart']))?count($session['cart']):0?></span>
                                </span>
                                </a>
                            <?php else : ?>
                                <div class="flex items-center justify-end space-x-3" data-v-1fee5f17="">
                                    <a href="<?=Url::to(['cart/cart'])?>" class="lg:hidden shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple" style="<?=(Yii::$app->controller->action->id == 'cart')?"border-bottom-color: rgb(85 43 252);":""?>">
                               <span class="fa-layers fa-fw fa-xl" style="--fa-beat-scale: 3.0;--fa-animation-duration: 2s;">
                                 <i class="fa-solid fa-cart-shopping" ></i>
                                 <span class="fa-layers-counter fa-2x" style="<?=(isset($session['cart']))?'':'display: none;'?>"><?=(isset($session['cart']))?count($session['cart']):0?></span>
                               </span>
                                    </a>
                                    <?php if((isset($user))&&(($user->primary_group!=2)||($user->terms_of_use!=1))):?>
                                        <a href="<?=Url::to(['user/startselling'])?>" class="btn-purple hidden lg:block" data-v-1fee5f17="">Start Selling</a>
                                    <?php else : ?>
                                        <a href="<?=Url::to(['user/media'])?>" class="btn-purple hidden lg:block" data-v-1fee5f17="">My media</a>
                                    <?php endif; ?>
                                    <span style="line-height:0;" data-v-1fee5f17="">
                                 <span style="display:none;" class="">
                                    <div class="popper relative top-2 overflow-hidden whitespace-nowrap rounded bg-white px-5 py-2 shadow-xl dark:bg-121212" style="width:150px;" data-v-1fee5f17="">
                                       <div data-v-1fee5f17="" class="vue-slider vue-slider-ltr" style="padding: 7px 0px; width: auto; height: 4px;">
                                          <div class="vue-slider-rail">
                                             <div class="vue-slider-process" style="height: 100%; top: 0px; left: 0%; width: 100%; transition-property: width, left; transition-duration: 0.5s;"></div>
                                             <div aria-valuetext="10" class="vue-slider-dot" role="slider" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10" aria-orientation="horizontal" tabindex="0" style="width: 14px; height: 14px; transform: translate(-50%, -50%); top: 50%; left: 100%; transition: left 0.5s ease 0s;">
                                                <div class="vue-slider-dot-handle"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </span>
                        
                              </span>
                                    <!---->
                                    <span class="shrink-0" data-v-1fee5f17="">
                                 <span id="user-menu" class="hidden" style="position: absolute; will-change: transform; top: 0px; right: 300px; transform: translate3d(0px, 51px, 0px);">
                                    <div class="popper relative top-2 overflow-hidden whitespace-nowrap rounded-xl bg-white text-black shadow-xl dark:bg-[#2d2d2d] dark:text-white dark:shadow-[0px_8px_24px_rgba(0,0,0,0.72)]" style="min-width:262px;">
                                       <ul class="p-2 text-[17px] font-normal leading-[22px]">
                                          <li class="group">
                                             <a href="<?=Url::to(['user/account'])?>" class="flex items-center space-x-4 rounded-[10px] p-2 hover:bg-[#dedede] dark:hover:bg-white/[0.16]">
                                                <div><img alt="" src="<?=Yii::$app->request->baseUrl?>/modx/<?=($user->attribut->photo!='')?$user->attribut->photo:'images/user_photo/user_icon.png'?>" class="user_avatar h-10 w-10 rounded-full"></div>
                                                <div class="flex flex-1 items-start">
                                                   <div class="w-full max-w-[110px]">
                                                      <h6 class="truncate"><?=Yii::$app->user->identity->username?></h6>
                                                      <span class="text-[13px] leading-[18px] group-hover:underline text-888888 group-hover:text-black dark:text-[#b7b7b7] dark:group-hover:text-white">
                                                      View my profile
                                                      </span>
                                                   </div>
                                                    <!---->
                                                </div>
                                             </a>
                                          </li>
                                          <li class="my-2 border-b dark:border-white/[0.16]"></li>
                                           <!---->
                                          <li><a href="<?=Url::to(['user/account'])?>" class="block rounded-[10px] py-2 px-3 hover:bg-[#dedede] dark:hover:bg-white/[0.16]">
                                             Account
                                             </a>
                                          </li>
                                          <li class="my-2 border-b dark:border-white/[0.16]"></li>
                                          <li><a href="<?=Url::to(['user/logout'])?>" class="block w-full rounded-[10px] py-2 px-3 text-left hover:bg-[#dedede] dark:hover:bg-white/[0.16]">
                                             Sign out
                                           </a>
                                          </li>
                                          <li class="my-2 border-b dark:border-white/[0.16]"></li>
                                          <li>
                                             <div class="rounded-[10px] py-2 px-3 hover:bg-[#dedede] dark:hover:bg-white/[0.16]">
                                                <div class="toggle-new flex w-full items-center">
                                       
                                                   <div class="mr-5 inline-flex items-center space-x-3">
                                                      <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[17px]">
                                                         <path d="M7.23333 1.47778C7.54444 1.32222 7.7 0.933333 7.62222 0.622222C7.54444 0.311111 7.15555 0 6.76667 0C2.95556 0.0777778 0 3.18889 0 7C0 10.8889 3.11111 14 7 14C9.95555 14 12.5222 12.1333 13.5333 9.41111C13.6889 9.1 13.5333 8.71111 13.2222 8.47778C12.9111 8.24444 12.5222 8.32222 12.2889 8.55556C11.5111 9.25556 10.5 9.64444 9.41111 9.64444C7 9.64444 4.97778 7.7 4.97778 5.21111C4.97778 3.73333 5.83333 2.25556 7.23333 1.47778ZM9.41111 11.2C9.8 11.2 10.1889 11.2 10.5 11.1222C9.56667 11.9778 8.32222 12.4444 7 12.4444C3.96667 12.4444 1.55556 10.0333 1.55556 7C1.55556 5.05556 2.64444 3.26667 4.27778 2.33333C3.73333 3.18889 3.5 4.2 3.5 5.28889C3.42222 8.55556 6.14444 11.2 9.41111 11.2Z" class="fill-current"></path>
                                                      </svg>
                                                      <span><?=$carrent_theme=="Light"?"Dark":"Light"?> theme</span>
                                                   </div>
                                                   <label class="flex cursor-pointer items-center">
                                                      <div class="relative">
                                                         <input type="checkbox" checked="checked" class="sr-only">
                                                         <div class="design line block h-7 w-12 rounded-full border-2 border-[#0A0A0A] bg-white transition duration-500"></div>
                                                         <div class="dot absolute left-[5px] top-[5px] h-[18px] w-4.5 rounded-full bg-[#515258] transition duration-500"></div>
                                                      </div>
                                                   </label>
                                                </div>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </span>
                                 <button id="btn-user-menu" class="group flex items-center">
                                    <img alt="" src="<?=Yii::$app->request->baseUrl?>/modx/<?=($user->attribut->photo!='')?$user->attribut->photo:'images/user_photo/user_icon.png'?>" class="download user_avatar h-10 w-10 rounded-full border-2 border-transparent transition-colors duration-300 group-hover:border-purple">
                                    <svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-2 hidden h-3 w-3 transform transition-opacity duration-300 group-hover:opacity-0 lg:block">
                                       <path d="M9.5 4.25L6 7.75L2.5 4.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                 </button>
                              </span>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="mt-4 hidden lg:block" data-v-1fee5f17>
                        <div class="flex items-center justify-between" data-v-1fee5f17>
                            <div class="flex items-center space-x-8" data-v-1fee5f17>
                                <a href="<?=Url::to(['site/explore'])?>" aria-current="page" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'explore')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>Explore</a>
                                <!--<a href="<?=Url::to(['site/samples'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'samples')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>Samples</a>-->
                                <a href="<?=Url::to(['site/packs'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'packs')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>Packs</a>
                                <a href="<?=Url::to(['site/selections'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'selections')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>Genres</a>
                                <!-- <a href="<?=Url::to(['site/creators'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'creators')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>Creators</a> -->
                                <!--<a href="<?=Url::to(['site/samples'])?>?type=MID" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=($type == 'MID')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>MIDI</a>-->
                                <a href="<?=Url::to(['site/gfx'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'gfx')?"nuxt-link-exact-active nuxt-link-active":""?>" data-v-1fee5f17>GFX</a>
                            </div>
                            <!---->
                            <?php if(!Yii::$app->user->isGuest): ?>

                                <div class="flex items-center space-x-8" data-v-1fee5f17="">
                                    <a href="<?=Url::to(['user/account'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'account')?"nuxt-link-active":""?>" data-v-1fee5f17="">
                                        My Account
                                    </a>
                    
                                    <a href="<?=Url::to(['user/downloads'])?>" class="download shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'downloads')?"nuxt-link-active":""?>" data-v-1fee5f17="">Downloads</a>
                                    <a href="<?=Url::to(['user/likes'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple <?=(Yii::$app->controller->action->id == 'likes')?"nuxt-link-active":""?>" data-v-1fee5f17="">Likes</a>
                                    <a href="<?=Url::to(['cart/cart'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple" style="<?=(Yii::$app->controller->action->id == 'cart')?"border-bottom-color: rgb(85 43 252);":""?>">
                                 <span class="fa-layers fa-fw fa-xl" style="--fa-beat-scale: 3.0;--fa-animation-duration: 2s;">
                                   <i class="fa-solid fa-cart-shopping" ></i>
                                   <span class="fa-layers-counter fa-2x" style="<?=(isset($session['cart']))?'':'display: none;'?>"><?=(isset($session['cart']))?count($session['cart']):0?></span>
                                 </span>
                                    </a>
                                </div>
                            <?php else:?>
                                
                                <div class="flex items-center space-x-8" data-v-1fee5f17="">
                                    <a href="<?=Url::to(['cart/cart'])?>" class="shrink-0 border-b-2 border-b-transparent pb-[7px] leading-[18px] transition-colors duration-300 hover:border-b-purple" style="<?=(Yii::$app->controller->action->id == 'cart')?"border-bottom-color: rgb(85 43 252);":""?>">
                                        <span class="fa-layers fa-fw fa-xl" style="--fa-beat-scale: 3.0;--fa-animation-duration: 2s;">
                                        <i class="fa-solid fa-cart-shopping" ></i>
                                        <span class="fa-layers-counter fa-2x" style=""><?=(isset($session['cart']))?count($session['cart']):0?></span>
                                        </span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="block pt-3 lg:hidden box-small" data-v-1fee5f17>
                    <form class="" action="<?=Url::to(['site/search'])?>" data-v-1fee5f17>
                        <input name="search" type="text" autocomplete="off" placeholder="Search samples or packs..." value="" class="form-field h-10 rounded-full border-2 border-black/[0.16] p-0 py-[15px] pl-[22px] pr-20 placeholder-adadad placeholder:text-5c5c5c focus:border-purple dark:border-white/[0.16] dark:bg-[#242424] dark:placeholder:text-[#b7b7b7] dark:focus:border-purple" data-v-1fee5f17>
                        <button type="button" class="absolute right-[57px] top-1/2 z-[5] w-[18px] -translate-y-1/2 cursor-pointer text-5c5c5c dark:text-[#b7b7b7]" style="display:none;" data-v-1fee5f17>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5" data-v-1fee5f17>
                                <path d="M14.8482 7.19779C15.1737 7.52323 15.1737 8.05087 14.8482 8.3763L13.2153 10.0093L14.8482 11.6422C15.1737 11.9677 15.1737 12.4953 14.8482 12.8207C14.5228 13.1462 13.9952 13.1462 13.6697 12.8207L12.0368 11.1878L10.4038 12.8207C10.0784 13.1462 9.55072 13.1462 9.22528 12.8207C8.89984 12.4953 8.89984 11.9677 9.22528 11.6422L10.8582 10.0093L9.22528 8.3763C8.89984 8.05087 8.89984 7.52323 9.22528 7.19779C9.55072 6.87236 10.0784 6.87236 10.4038 7.19779L12.0368 8.83076L13.6697 7.19779C13.9952 6.87236 14.5228 6.87236 14.8482 7.19779Z" class="fill-current"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.22438 3.53458C6.38262 3.35373 6.61122 3.25 6.85153 3.25H16.4812C17.0951 3.25 17.6839 3.49388 18.118 3.92799C18.5521 4.36211 18.796 4.95089 18.796 5.56481V14.4537C18.796 15.0676 18.5521 15.6564 18.118 16.0905C17.6839 16.5246 17.0951 16.7685 16.4812 16.7685H6.85153C6.61122 16.7685 6.38262 16.6648 6.22438 16.4839L1.03919 10.558C0.764279 10.2438 0.764279 9.77469 1.03919 9.46051L6.22438 3.53458ZM7.22967 4.91667L2.77365 10.0093L7.22967 15.1019H16.4812C16.6531 15.1019 16.8179 15.0336 16.9395 14.912C17.061 14.7905 17.1293 14.6256 17.1293 14.4537V5.56481C17.1293 5.39292 17.061 5.22806 16.9395 5.1065C16.8179 4.98495 16.6531 4.91667 16.4812 4.91667H7.22967Z" class="fill-current"></path>
                            </svg>
                        </button>
                        <button type="submit" class="absolute right-[13px] top-1/2 z-[5] -translate-y-1/2" data-v-1fee5f17>
    
                        </button>
                    </form>
                </div>
            </div>

            <!--  end menu             -->



            <?php
            // var_dump(Yii::$app->controller->action->id);

            ?>

            <?php if(Yii::$app->controller->action->id == 'explore' || Yii::$app->controller->action->id == 'explore2' || Yii::$app->controller->action->id == 'exp') : ?>
                <!-- Demo styles -->
                <style>

/* 27_12 */



.tns-nav {
    display: block !important;
}
.fa-layers-counter {
    position: absolute;
    top: -10px; /* Настройте для точного позиционирования */
    right: -10px; /* Настройте для точного позиционирования */
    font-size: 0.75rem; /* Уменьшите шрифт, если он слишком велик */
    width: 18px; /* Сделайте элемент круглее */
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ff0000; /* Красный фон */
    color: #fff; /* Белый текст */
    border-radius: 50%; /* Круглый вид */
    transform: translate(50%, -50%); /* Точная корректировка позиции */
}
.fa-solid.fa-cart-shopping {
    font-size: 1.5rem; /* Настройте размер иконки */
}



/*  */




/* Основные стили для контейнера слайдера */
.header {
    position: relative !important;
    height: 80px; /* Задайте точную высоту */
    overflow: hidden;
}

/* Общий контейнер */
.slider-container {
    position: relative;
    overflow: hidden;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Слайдер */
.my-slider {
    display: flex;
    width: 100%;
    height: 500px; 
    overflow: hidden;
    visibility: hidden; /* Открывается после загрузки */
}

.my-slide {
    display: flex;
    flex-direction: row-reverse; /* Меняем порядок: сначала картинка, потом контент */
    align-items: center;
    justify-content: space-between;
    flex-shrink: 0;
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
}

/* Правая часть с изображением */
.slide-left {
    flex: 1.5;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 20px; /* Отступ справа от контента */
}

.img-slider {
    max-width: 100%;
    height: auto;
    max-height: 400px;
    object-fit: contain;
    border-radius: 5px;
}


.slide-right {
    flex: 1;
    text-align: left;
    padding-right: 20px; /* Отступ справа от картинки */
}

.slide-right h2 {
    color: #fff;
    font-size: 24px;
    margin-bottom: 10px;
}
.slide-right p {
    color: #fff;
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 15px;
}

/* Блок с кнопкой и ценой */
.priceslide,
.btn-white2 {
    display: inline-block;
    vertical-align: middle;
}


/* Увеличиваем ширину блока с ценой */

/* Цена справа */
.priceslide {
    display: inline-block;
    text-align: center;
    padding: 10px 20px;
    font-size: 29px !important; 
    /* Увеличиваем размер шрифта */
    font-weight: bold;
    color: #fff;
    /* background-color: #333; */
     /* Опциональный фон */
    border-radius: 5px;
    margin-left: auto; /* Сдвигает цену вправо */
    min-width: 120px; /* Увеличиваем минимальную ширину */
}


/* Кнопка слева */
.btn-white2 {
    padding: 10px 20px;
    background: #fff;
    color: #333;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: background 0.3s ease;
    margin-right: auto; /* Сдвигает кнопку влево */
}


.btn-white2:hover {
    background: #f7f7f7;
}

.action-container{
    display: flex; 
    justify-content: space-between;
    align-items: center;
}




/* Кнопки переключения */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
}

.prev {
    left: 10px;
}

.next {
    right: 10px;
}



/* кнопки навиг */


/* 27_12 */
                    /*    new styles my*/

.myFlex{
    justify-content: space-around;
}

.myTop img {
    width: 324px;
    height: 313px;

}
.carousel-control-next-icon, .carousel-control-prev-icon {
    background-image: none;
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    color: #5598;
}

.carousel-control-prev-icon::before{
    content: "\f104";
}

.carousel-control-next-icon::before{
    content: "\f105";
}

                </style>



<!-- 27_12 libslider -->


<!-- Подключаем стили -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tiny-slider@2.9.5/dist/tiny-slider.css">

<!-- Подключаем Tiny Slider JS -->
<script src="https://cdn.jsdelivr.net/npm/tiny-slider@2.9.5/dist/min/tiny-slider.js"></script>

<!-- Ваши стили и другие скрипты -->
<style>
  .slider-container { position: relative; overflow: hidden; }
  .my-slider .slide { text-align: center; padding: 20px; }
  .my-slider img { width: 90%; margin: 0 auto; }
</style>

<!-- 27_12 -->

   <!-- start -->
<?php $main_slider = $this->context->get_main_slader_pack();  ?>

<div class="slider-container" style="height: 500px;">
    <div class="my-slider tns-slider">
        <?php foreach ($main_slider as $pack): ?>
            <?php $pricePack = $this->context->pack_info($pack['id'])['price']; ?>
            <div class="my-slide">
                <div class="slide-left">
                    <img src="<?=Yii::$app->request->baseUrl?>/modx/<?=$pack['img']?>" alt="Slider Image" class="img-slider">
                </div>
                <div class="slide-right">
                    <h2><?= substr($pack['title'], 0, 21); ?></h2>
                    <p><?= substr($pack['description'], 0, 150); ?></p>
                    <div class="action-container">
                        <a href="<?=Url::to(['site/pack'])?>/<?=$pack['id']?>" class="btn-white2">Browse Pack</a>
                        <span class="priceslide"><?= $pricePack ?> $</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="prev">←</button>
    <button class="next">→</button>
</div>


                <!---/Slaider------------------------------------------------------------------------->
            <?php endif; ?>

            <div class="main-content-area mt-12 box-small" style="min-height: 500px">


                <div class="block lg:hidden" data-v-6915f321>

                    <div class="mobile-menu fixed inset-0 z-[32] bg-[rgba(44,44,44,0.72)] lg:hidden hidden" data-v-6915f321></div>
                    <!-- Hello -->
                    <div sticky-offset="{ top: 105 }" sticky-z-index="38" class="sticky-nav z-20 h-screen w-full myWFull pb-8 font-circular-std lg:block lg:h-auto lg:w-56 hidden bg-white dark:bg-black pt-9" data-v-6915f321>
                        <!-- Hello2  -->
                        <div class="fixed flex h-16 w-full max-w-[232px] items-center border-b px-8 py-[18px] dark:bg-black lg:h-24 border-black/[0.16] bg-white dark:border-white/[0.16] dark:bg-black top-9" data-v-6915f321>
                            <a href="/" class="w-full nuxt-link-active dark:text-white" data-v-6915f321>
                                <img id="headimg" src="/img/logo_name_white.png" class="w-20 lg:w-24">

                            </a>
                            <button type="button" class="close-mobile-menu absolute -right-14 rounded-full bg-white" data-v-6915f321>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black hover:text-[#7E8084]" data-v-6915f321>
                                    <path d="M0 14C0 6.26801 6.26801 0 14 0V0C21.732 0 28 6.26801 28 14V14C28 21.732 21.732 28 14 28V28C6.26801 28 0 21.732 0 14V14Z" class="bg-remove"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9697 8.03021C20.3211 8.38168 20.3211 8.95153 19.9697 9.303L9.303 19.9697C8.95153 20.3211 8.38168 20.3211 8.03021 19.9697C7.67873 19.6182 7.67873 19.0483 8.03021 18.6969L18.6969 8.03021C19.0483 7.67873 19.6182 7.67873 19.9697 8.03021Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9698 19.9697C19.6183 20.3211 19.0485 20.3211 18.697 19.9697L8.03033 9.303C7.67886 8.95153 7.67886 8.38168 8.03033 8.0302C8.3818 7.67873 8.95165 7.67873 9.30313 8.0302L19.9698 18.6969C20.3213 19.0483 20.3213 19.6182 19.9698 19.9697Z" fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                        <section class="mt-[60px] h-full overflow-y-auto overscroll-none px-4 pt-5 pb-24 text-[17px] leading-[22px]" data-v-6915f321>
                            <div data-v-6915f321>
                                <h3 class="px-4 text-5c5c5c dark:text-[#B7B7B7]" data-v-6915f321>
                                    Music
                                </h3>
                                <ul class="mt-4 dark:text-white myItemFlex" data-v-6915f321>
                                    <li data-v-6915f321>
                                        <a href="<?=Url::to(['site/explore'])?>" aria-current="page" class="flex items-center space-x-2.5 whitespace-nowrap rounded-full px-4 py-2.5 nuxt-link-exact-active nuxt-link-active nuxt-link-exact-active hover:bg-black/[0.08] dark:hover:bg-white/[0.16]" data-v-6915f321>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4" data-v-6915f321>
                                                <path d="M11.2239 3.93097L6.56774 6.05903C6.34255 6.16196 6.16196 6.34255 6.05903 6.56774L3.93097 11.2239C3.68548 11.761 4.23871 12.3145 4.77613 12.069L9.43226 9.94097C9.65745 9.83804 9.83804 9.65745 9.94097 9.43226L12.069 4.77613C12.3145 4.23871 11.7613 3.68548 11.2239 3.93097ZM8.72839 8.72839C8.32613 9.13064 7.67387 9.13064 7.27161 8.72839C6.86935 8.32613 6.86935 7.67387 7.27161 7.27161C7.67387 6.86935 8.32613 6.86935 8.72839 7.27161C9.13064 7.67387 9.13064 8.32613 8.72839 8.72839ZM8 0C3.58161 0 0 3.58161 0 8C0 12.4184 3.58161 16 8 16C12.4184 16 16 12.4184 16 8C16 3.58161 12.4184 0 8 0ZM8 14.4516C4.44258 14.4516 1.54839 11.5574 1.54839 8C1.54839 4.44258 4.44258 1.54839 8 1.54839C11.5574 1.54839 14.4516 4.44258 14.4516 8C14.4516 11.5574 11.5574 14.4516 8 14.4516Z" class="fill-current"></path>
                                            </svg>
                                            <span class="flex-grow" data-v-6915f321>Explore</span>
                                        </a>
                                    </li>
              
                                    <li data-v-6915f321>
                                        <a href="<?=Url::to(['site/packs'])?>" class="flex items-center space-x-2.5 whitespace-nowrap rounded-full px-4 py-2.5 hover:bg-black/[0.08] dark:hover:bg-white/[0.16]" data-v-6915f321>
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4" data-v-6915f321>
                                                <g clip-path="url(#clip0_3125_7118)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.903991 1.40399C1.16266 1.14532 1.51349 1 1.87931 1H6.03379C6.27909 1 6.51175 1.10882 6.66899 1.29709L8.26399 3.2069H13.9069C15.339 3.2069 16.5 4.36787 16.5 5.8V11.8453C16.5 13.2774 15.339 14.4384 13.9069 14.4384H3.0931C1.66097 14.4384 0.5 13.2775 0.5 11.8453V2.37931C0.5 2.01349 0.64532 1.66266 0.903991 1.40399ZM2.15517 2.65517V11.8453C2.15517 12.3633 2.5751 12.7833 3.0931 12.7833H13.9069C14.4249 12.7833 14.8448 12.3633 14.8448 11.8453V5.8C14.8448 5.28199 14.4249 4.86207 13.9069 4.86207H8.12339C7.92309 4.86038 7.72555 4.81506 7.54452 4.72931C7.36383 4.64372 7.20391 4.51988 7.07584 4.36636M7.07511 4.36549L5.64672 2.65517H2.15517" class="fill-current"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3125_7118">
                                                        <rect width="16" height="16" transform="translate(0.5)" class="fill-current"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="flex-grow" data-v-6915f321>Packs</span>
                                        </a>
                                    </li>
                                    <li data-v-6915f321>
                                        <a href="<?=Url::to(['site/selections'])?>" class="flex items-center space-x-2.5 whitespace-nowrap rounded-full px-4 py-2.5 hover:bg-black/[0.08] dark:hover:bg-white/[0.16]" data-v-6915f321>
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4" data-v-6915f321>
                                                <g clip-path="url(#clip0_3146_7790)">
                                                    <path d="M15.1667 2H13.8333V1.33333C13.8329 0.979836 13.6923 0.640933 13.4424 0.390972C13.1924 0.141012 12.8535 0.000405822 12.5 0H4.5C4.1465 0.000405822 3.8076 0.141012 3.55764 0.390972C3.30768 0.640933 3.16707 0.979836 3.16667 1.33333V2H1.83333C1.47984 2.00041 1.14093 2.14101 0.890972 2.39097C0.641012 2.64093 0.500406 2.97984 0.5 3.33333V5.33333C0.500794 6.04033 0.782001 6.71815 1.28193 7.21807C1.78185 7.718 2.45967 7.99921 3.16667 8H3.38133C3.65912 9.02049 4.22804 9.93801 5.01863 10.6405C5.80922 11.3431 6.78726 11.8002 7.83333 11.9561V14.6667H5.66667C5.29848 14.6667 5 14.9651 5 15.3333C5 15.7015 5.29848 16 5.66667 16H11.3333C11.7015 16 12 15.7015 12 15.3333C12 14.9651 11.7015 14.6667 11.3333 14.6667H9.16667V11.9541C10.2263 11.8231 11.2219 11.3757 12.0234 10.6703C12.825 9.96498 13.3953 9.03439 13.66 8H13.8333C14.5403 7.99921 15.2182 7.718 15.7181 7.21807C16.218 6.71815 16.4992 6.04033 16.5 5.33333V3.33333C16.4996 2.97984 16.359 2.64093 16.109 2.39097C15.8591 2.14101 15.5202 2.00041 15.1667 2ZM3.16667 6.66667C2.81317 6.66626 2.47427 6.52565 2.22431 6.27569C1.97435 6.02573 1.83374 5.68683 1.83333 5.33333V3.33333H3.16667V6.66667ZM12.5 6.66667C12.5 7.20236 12.3924 7.7326 12.1836 8.22592C11.9747 8.71923 11.669 9.16558 11.2844 9.53847C10.8997 9.91136 10.4442 10.2032 9.94462 10.3967C9.44508 10.5901 8.91177 10.6813 8.37633 10.6647C7.31468 10.5989 6.31929 10.1262 5.59729 9.34511C4.87528 8.56398 4.48226 7.53455 4.5 6.471V1.33333H12.5V6.66667ZM15.1667 5.33333C15.1663 5.68683 15.0257 6.02573 14.7757 6.27569C14.5257 6.52565 14.1868 6.66626 13.8333 6.66667V3.33333H15.1667V5.33333Z" class="fill-current"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3146_7790">
                                                        <rect width="16" height="16" fill="white" transform="translate(0.5)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="flex-grow" data-v-6915f321>Genres</span>
                                        </a>
                                    </li>
                        
                                    <li data-v-6915f321>
                                        <a href="<?=Url::to(['site/gfx'])?>" class="flex items-center space-x-2.5 whitespace-nowrap rounded-full px-4 py-2.5 hover:bg-black/[0.08] dark:hover:bg-white/[0.16]" data-v-6915f321>
                                            <svg viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4" data-v-6915f321>
                                                <ellipse cx="7.64992" cy="4.18435" rx="3.9817" ry="3.54568" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></ellipse>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.334 12.6619C1.33293 12.4127 1.39553 12.1665 1.51706 11.9419C1.89845 11.2627 2.97397 10.9027 3.86642 10.7397C4.51005 10.6174 5.16257 10.5356 5.81912 10.4951C7.03468 10.4001 8.25726 10.4001 9.47282 10.4951C10.1293 10.5361 10.7818 10.6178 11.4255 10.7397C12.318 10.9027 13.3935 11.2287 13.7749 11.9419C14.0193 12.3997 14.0193 12.931 13.7749 13.3887C13.3935 14.102 12.318 14.428 11.4255 14.5842C10.7826 14.7116 10.1299 14.7956 9.47282 14.8355C8.48346 14.9102 7.48947 14.9239 6.49799 14.8763C6.26916 14.8763 6.04796 14.8763 5.81912 14.8355C5.16451 14.7961 4.51425 14.7121 3.87404 14.5842C2.97397 14.428 1.90608 14.102 1.51706 13.3887C1.39615 13.1616 1.33361 12.9133 1.334 12.6619Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <span class="flex-grow" data-v-6915f321>GFX</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-3 mb-2.5 border-t border-black/[0.16] dark:border-white/[0.16]" data-v-6915f321></div>
                            <div data-v-6915f321>
             
                               
                            </div>
                        </section>
                    </div>
                </div>
                <?= $content ?>

                <?php $footer=$this->context->get_page_footer(); ?>
                <div class="footer relative mt-20 border-t border-black/[0.08] bg-white py-12 text-sm leading-[18px] dark:border-[#1f1f1f] dark:bg-black dark:text-white lg:z-30 lg:py-16">
                    <div class="flex flex-wrap md:flex-nowrap box-small">
                        <div class="tw-logo-wrap myWrap flex w-full flex-shrink-0 justify-between text-5c5c5c dark:text-[#b7b7b7] md:w-48 md:flex-col md:justify-start lg:w-44 lg:justify-between">
                            <!--<a href="account/downloads.html" class="tw-logo nuxt-link-active">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 113 35" class="w-[91px] text-black dark:text-white lg:w-[78px]">
                              <defs>
                                 <clipPath id="maqra">
                                    <path d="M.01.63h61.345v33.875H.01z"></path>
                                 </clipPath>
                              </defs>
                              <g>
                                 <g>
                                    <g>
                                       <path fill="currentColor" d="M112.582 10.623C113.304 4.04 107.97.1 100.33.1a20.45 20.45 0 0 0-3.992.383l-8.138 15.586c3.634 4.918 12.562 5.095 12.562 8.968 0 1.586-1.297 2.403-3.073 2.403-2.31 0-3.365-1.297-3.173-3.46h-9.947c-.818 7.303 4.854 10.86 12.924 10.86 8.412 0 13.455-4.565 13.455-10.62 0-9.849-14.029-9.656-14.029-14.271 0-1.537 1.202-2.45 2.883-2.45 1.922 0 2.979 1.2 2.644 3.124h10.137"></path>
                                    </g>
                                    <g>
                                       <path fill="currentColor" d="M58.09.63h10.04l3.366 24.41L83.461.63h10.043L75.82 34.505H63.808L58.09.63"></path>
                                    </g>
                                    <g>
                                       <g></g>
                                       <g clip-path="url(#maqra)">
                                          <path fill="currentColor" d="M55.679.63h-1.618L48.48 11.187l1.626 10.633h-7.215l-3.761 7.153.067.006h12.015l.862 5.526h9.278L55.679.63"></path>
                                       </g>
                                       <g clip-path="url(#maqra)">
                                          <path fill="currentColor" d="M0 .63h10.186l-.096 23.16L19.458.63H29.79l1.042 21.74L41.686.63h9.75L33.532 34.505H23.257L22.246 13.7 13.79 34.505H2.209L0 .63"></path>
                                       </g>
                                    </g>
                                 </g>
                              </g>
                           </svg>
                        </a>-->
                            <a href="/"><img id="footerimg" src="<?=Yii::$app->request->baseUrl?>/img/logo<?=$carrent_theme=="Light"?"":"_white"?>.png" style="height:45px"></a>
                            <!-- <p class="hidden md:my-16 md:block lg:my-0">
                        <?=(isset($footer['inf']['content']))?$footer['inf']['content']:''?>
                        </p> -->
                            <div class="tw-dark-mode-switch inline-block">
                                <div>
                                    <div class=" toggle-new flex w-full items-center">
                                        <div class="mr-5 inline-flex items-center space-x-3">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[17px]">
                                                <path d="M7.23333 1.47778C7.54444 1.32222 7.7 0.933333 7.62222 0.622222C7.54444 0.311111 7.15555 0 6.76667 0C2.95556 0.0777778 0 3.18889 0 7C0 10.8889 3.11111 14 7 14C9.95555 14 12.5222 12.1333 13.5333 9.41111C13.6889 9.1 13.5333 8.71111 13.2222 8.47778C12.9111 8.24444 12.5222 8.32222 12.2889 8.55556C11.5111 9.25556 10.5 9.64444 9.41111 9.64444C7 9.64444 4.97778 7.7 4.97778 5.21111C4.97778 3.73333 5.83333 2.25556 7.23333 1.47778ZM9.41111 11.2C9.8 11.2 10.1889 11.2 10.5 11.1222C9.56667 11.9778 8.32222 12.4444 7 12.4444C3.96667 12.4444 1.55556 10.0333 1.55556 7C1.55556 5.05556 2.64444 3.26667 4.27778 2.33333C3.73333 3.18889 3.5 4.2 3.5 5.28889C3.42222 8.55556 6.14444 11.2 9.41111 11.2Z" class="fill-current"></path>
                                            </svg>
                                            <span><?=$carrent_theme=="Light"?"Dark":"Light"?> theme</span>
                                        </div>
                                        <label class=" flex cursor-pointer items-center">
                                            <div class="relative">
                                                <input type="checkbox" checked="checked" class="sr-only">
                                                <div class="design line block h-7 w-12 rounded-full border-2 border-[#0A0A0A] bg-white transition duration-500"></div>
                                                <div class="dot absolute left-[5px] top-[5px] h-[18px] w-4.5 rounded-full bg-[#515258] transition duration-500"></div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-0 w-full border-b border-black/[0.12] pt-2.5 dark:border-white/[0.12] md:ml-32 md:border-none lg:ml-40 xl:ml-80">
                            <div class="tw-cols -mb-12 flex flex-wrap py-12 md:py-0 lg:mb-0">
                                <div class="mb-12 w-1/2 sm:w-1/3 lg:mb-0 lg:w-1/5">
                                    <h3 class="text-[#8e8e8e]">Music</h3>
                                    <?=(isset($footer['Music']['content']))?$footer['Music']['content']:''?>

                                    <ul class="mt-5 space-y-5 text-black dark:text-white">
                                        <!-- <li><a href="<?=Url::to(['site/samples'])?>" class="hover:text-5c5c5c">Samples</a></li> -->


                                        <li><a href="<?=Url::to(['/'])?>" class="hover:text-5c5c5c">Explore</a></li>
                                        <li><a href="<?=Url::to(['site/packs'])?>" class="hover:text-5c5c5c">Packs</a></li>
                                        <li><a href="<?=Url::to(['site/selections'])?>" class="hover:text-5c5c5c">Genres</a></li>
                                        <li><a href="<?=Url::to(['site/gfx'])?>" class="hover:text-5c5c5c">GFX</a></li>



                                        <?php if(isset($footer['Music']['pages'])):?>
                                            <?php foreach ($footer['Music']['pages'] as $f):?>
                                                <li><a href="<?=Url::to(['site/page','alias'=>$f['alias']])?>" class="hover:text-5c5c5c"><?=$f['pagetitle']?></a></li>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                                <div class="mb-12 w-1/2 sm:w-1/3 md:border-0 lg:mb-0 lg:w-1/5">
                                    <h3 class="text-[#8e8e8e]">Account</h3>
                                    <?=(isset($footer['Account']['content']))?$footer['Account']['content']:''?>
                                    <ul class="mt-5 space-y-5 text-black dark:text-white">
                                        <?php if((isset($user))&&($user->primary_group!=2)&&($user->primary_group!=3)):?>
                                            <li><a href="<?=Url::to(['user/startselling'])?>" class="btn_create_account hover:text-5c5c5c">Start Selling</a></li>
                                        <?php else : ?>
                                            <li><a href="<?=Url::to(['user/media'])?>" class="btn_create_account hover:text-5c5c5c">My media</a></li>
                                        <?php endif; ?>
                                        <?php if(Yii::$app->user->isGuest):?>
                                            <li><button type="button" class="show_modal_sign_in hover:text-5c5c5c">Sign in</button></li>
                                        <?php else : ?>
                                            <li><a href="<?=Url::to(['user/account'])?>" class="btn_create_account hover:text-5c5c5c">My Account</a></li>
                                        <?php endif; ?>
                                        <?php if(isset($footer['Account']['pages'])):?>
                                            <?php foreach ($footer['Account']['pages'] as $f):?>
                                                <li><a href="<?=Url::to(['site/page','alias'=>$f['alias']])?>" class="hover:text-5c5c5c"><?=$f['pagetitle']?></a></li>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                                <div class="mb-12 w-1/2 sm:w-1/3 md:border-0 lg:mb-0 lg:w-1/5">
                                    <h3 class="text-[#8e8e8e]">Support</h3>
                                    <?=(isset($footer['Support']['content']))?$footer['Support']['content']:''?>

                                    <ul class="mt-5 space-y-5 text-black dark:text-white">
                                        <li><a target="_blank" href="mailto:support@vintapes.com" class="hover:text-5c5c5c">Contact Support</a></li>
                                        <li><button id="btn_modal_feedback" class="hover:text-5c5c5c">Feedback</button></li>
                                        <?php if(isset($footer['Support']['pages'])):?>
                                            <?php foreach ($footer['Support']['pages'] as $f):?>
                                                <li><a href="<?=Url::to(['site/page','alias'=>$f['alias']])?>" class="hover:text-5c5c5c"><?=$f['pagetitle']?></a></li>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                                <div class="mb-12 w-1/2 sm:w-1/3 md:border-0 lg:mb-0 lg:w-1/5">
                                    <h3 class="text-[#8e8e8e]">Legal</h3>
                                    <?=(isset($footer['Legal']['content']))?$footer['Legal']['content']:''?>
                                    <ul class="mt-5 space-y-5 text-black dark:text-white">
                                        <?php if(isset($footer['Legal']['pages'])):?>
                                            <?php foreach ($footer['Legal']['pages'] as $f):?>
                                                <li><a href="<?=Url::to(['site/page','alias'=>$f['alias']])?>" class="hover:text-5c5c5c"><?=$f['pagetitle']?></a></li>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                                <div class="mb-12 w-1/2 sm:w-1/3 md:border-0 lg:mb-0 lg:w-1/5">
                                    <h3 class="text-[#8e8e8e]">Social Media</h3>
                                    <?=(isset($footer['Social Media']['content']))?$footer['Social Media']['content']:''?>
                                    <ul class="mt-5 space-y-5 text-black dark:text-white">
                                        <?php if(isset($footer['Social Media']['pages'])):?>
                                            <?php foreach ($footer['Social Media']['pages'] as $f):?>
                                                <li><a href="<?=Url::to(['site/page','alias'=>$f['alias']])?>" class="hover:text-5c5c5c"><?=$f['pagetitle']?></a></li>
                                            <?php endforeach;?>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top:4%" class="mt-12 w-full text-center text-[#8e8e8e] md:hidden"><?=(isset($footer['inf']['content']))?$footer['inf']['content']:''?></div>
                    </div>
                    <div id="modal_feedback" class="fixed inset-0 z-60 h-full w-full overflow-x-hidden bg-black bg-opacity-80 dark:bg-[#2c2c2c] dark:bg-opacity-70 hidden overflow-y-auto">
                        <div class=" modal-popup-container  text-center px-3 ">
                            <div class="  text-left align-middle" style="z-index:99999; margin-top:125px">
                                <div id="div_modal_feedback" class="relative mx-auto max-w-full rounded-2xl bg-white px-7 pt-7 pb-9 text-black shadow-lg dark:bg-121212 dark:text-white my-8" style="width:400px;">
                                    <button id="btn_close_feedback" class="text-primary absolute top-2.5 right-2.5 z-10 flex h-10 w-10 items-center justify-center opacity-100 hover:opacity-70">
                                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="w-5">
                                            <g>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" x1="7" x2="25" y1="7" y2="25" class="cls-1"></line>
                                                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2px" x1="7" x2="25" y1="25" y2="7" class="cls-1"></line>
                                            </g>
                                        </svg>
                                    </button>
                                    <div>
                                        <h3 class="text-center text-2xl font-medium">Feedback</h3>
                                        <p class="mt-5 text-center">We'd love to hear your feedback.<br>Please enter a comment below.</p>
                                        <form class="mt-7 space-y-6">
                                            <div><textarea placeholder="Comments..." class="form-field" style="min-height:150px;"></textarea></div>
                                            <div class="text-center text-gray-400">
                                                <button type="submit" class="w-full btn">
                                          <span class="spin w-4">
                                             <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="animate-spin">
                                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"></circle>
                                                <path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" class="opacity-75"></path>
                                             </svg>
                                          </span>
                                                    <span>Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!----> <!----> <!----> <!----> <!--auth-modal overflow-y-auto-->
                <div id="div_sign_in" class="fixed inset-0 z-60 h-full w-full overflow-x-hidden bg-black bg-opacity-80 dark:bg-[#2c2c2c] dark:bg-opacity-70 hidden font-circular-std overflow-y-hiden auth-modal">
                    <div id="2" class="animated modal-popup-container absolute inset-0 h-full w-full text-center px-0 sm:px-3 slideInUp">
                        <div id="3" class="inline-block w-full text-left align-middle">
                            <div id="4" class="relative mx-auto max-w-full rounded-2xl bg-white px-7 pt-7 pb-9 text-black shadow-lg dark:bg-121212 dark:text-white my-0 sm:my-8 rounded-lg overflow-hidden !p-0" style="width: 390px;">
                                <!---->
                                <div id="modal_sign_in" class="">
                                    <div id="5" class="relative bg-black hidden md:block">
                                        <div id="6" class="absolute inset-x-0 top-0 h-1/2 w-full bg-cover" style="background-position: center top; background-image: url(&quot;<?=Yii::$app->request->baseUrl?>/img/auth-bg.fd59959.png&quot;);">
                                            <div id="7" class="absolute inset-0" style="background: linear-gradient(rgba(0, 0, 0, 0) 0%, rgb(0, 0, 0) 100%);"></div>
                                        </div>
                                        <div id="8" class="absolute inset-x-0 bottom-[53px] px-8 text-center font-circular-std text-white">
                                            <!----> <!---->
                                            <h3 class="text-[32px] font-medium leading-9"></h3>
                                            <div class="mx-auto mt-2 text-[15px] max-w-xs">Unlock access to our extensive catalog. Subscribe for just $5.99. Cancel anytime.</div>
                                            <div class="mt-7 grid grid-cols-3 gap-4">
                                                <!----> <!---->
                                            </div>
                                            <!----> <!---->
                                        </div>
                                    </div>
                                    <!--login-->
                                    <div>
                                        <div data-v-5cbebc41="" class="flex space-x-6 whitespace-nowrap border-b border-[#EFEFEF] bg-white px-5 text-center text-lg font-medium text-[#7E8084] dark:border-0 dark:bg-121212 sm:grid sm:grid-cols-2 sm:space-x-0 sm:divide-x sm:!divide-[#EAEAEA] sm:border-0 sm:bg-[#fbfbfb] sm:px-0 sm:dark:!divide-black sm:dark:divide-opacity-[0.05]">
                                            <button data-v-5cbebc41="" type="button" class="btn_sign_in tab active tab_sign_in">Sign in</button>
                                            <button data-v-5cbebc41="" type="button" class="btn_create_account tab tab_create_account">Create account</button>
                                            <button data-v-5cbebc41="" type="button" tabindex="-1" class="remove !ml-auto block sm:hidden hide_modal_sign_in">
                                                <svg data-v-5cbebc41="" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" class="hide_modal_sign_in h-8 w-8 text-black hover:text-[#7E8084]">
                                                    <path d="M0 14C0 6.26801 6.26801 0 14 0V0C21.732 0 28 6.26801 28 14V14C28 21.732 21.732 28 14 28V28C6.26801 28 0 21.732 0 14V14Z" class="bg-remove hide_modal_sign_in"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9697 8.03021C20.3211 8.38168 20.3211 8.95153 19.9697 9.303L9.303 19.9697C8.95153 20.3211 8.38168 20.3211 8.03021 19.9697C7.67873 19.6182 7.67873 19.0483 8.03021 18.6969L18.6969 8.03021C19.0483 7.67873 19.6182 7.67873 19.9697 8.03021Z" fill="currentColor" class="hide_modal_sign_in"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9698 19.9697C19.6183 20.3211 19.0485 20.3211 18.697 19.9697L8.03033 9.303C7.67886 8.95153 7.67886 8.38168 8.03033 8.0302C8.3818 7.67873 8.95165 7.67873 9.30313 8.0302L19.9698 18.6969C20.3213 19.0483 20.3213 19.6182 19.9698 19.9697Z" fill="currentColor" class="hide_modal_sign_in"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form class="form_sign_in space-y-4 px-5 py-6 pb-10 sm:px-8 text-[#7E8084]" action="<?=Url::to(['user/login'])?>" method="post">
                                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                                            <div>
                                                <div data-v-f669de34="">
                                                    <!---->
                                                    <?php
                                                    //echo "<h1>Facebook</h1>";
                                                    $params = [
                                                        'client_id'     => '887724179015224',
                                                        'redirect_uri'  => 'https://vintapes.com/user/facebook',
                                                        'scope'         => 'email',
                                                        'response_type' => 'code'
                                                    ];
                                                    $url_facebook = 'https://www.facebook.com/dialog/oauth?' . urldecode(http_build_query($params));

                                                    ?>
                                                    <a href="<?=$url_facebook?>" data-v-f669de34="" type="button" class="btn-auth btn-auth-facebook hidden overflow-hidden lg:flex">
                                                        <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0">

                                             </span>
                                                    </a>
                                                    <a data-v-f669de34="" href="<?=$url_facebook?>" class="btn-auth btn-auth-facebook flex overflow-hidden lg:hidden">
                                                        <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>

                                                    <a href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" data-v-f669de34="" type="button" class="btn-auth btn-auth-google mt-4 hidden overflow-hidden lg:flex">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                    <a data-v-f669de34="" href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" class="btn-auth btn-auth-google mt-4 flex overflow-hidden lg:hidden">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                </div>
                                                <div class="my-8 flex items-center text-[#7F828A]"><span class="h-px w-full grow bg-[#ddd]"></span> <span class="whitespace-nowrap px-4">or sign in using email</span> <span class="h-px w-full grow bg-[#ddd]"></span></div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="text" name="username"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Email</span></label> <!---->
                                                </div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="password" name="password"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Password</span></label> <!---->
                                                </div>
                                            </div>
                                            <div class="!mt-2 text-right">

                                                <!-- <button type='button' style="display:inline-block;" onclick=freeBy()>By Not Registrated &nbsp;</button> -->
                                                <span style="cursor:pointer" onclick=freeBy()>By Not Registrated &nbsp; </span>


                                                <button type="button" class="hover:underline">

                                                    Forgot your password?
                                                </button>
                                            </div>
                                            <div class="!mt-5 text-center">
                                                <button type="submit" class="btn btn-auth w-full rounded-[5px] py-2.5 text-[17px] leading-[26px]">
                                                    <div style="display: none;">
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent; display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_1099">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_1099)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.607131481170654 C1.5,-4.607131481170654 1.5,4.607131481170654 1.5,4.607131481170654 C1.5,5.434981346130371 0.8278499841690063,6.107131481170654 0,6.107131481170654 C0,6.107131481170654 0,6.107131481170654 0,6.107131481170654 C-0.8278499841690063,6.107131481170654 -1.5,5.434981346130371 -1.5,4.607131481170654 C-1.5,4.607131481170654 -1.5,-4.607131481170654 -1.5,-4.607131481170654 C-1.5,-5.434981346130371 -0.8278499841690063,-6.107131481170654 0,-6.107131481170654 C0,-6.107131481170654 0,-6.107131481170654 0,-6.107131481170654 C0.8278499841690063,-6.107131481170654 1.5,-5.434981346130371 1.5,-4.607131481170654z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.607131481170654 C1.5,-4.607131481170654 1.5,4.607131481170654 1.5,4.607131481170654 C1.5,5.434981346130371 0.8278499841690063,6.107131481170654 0,6.107131481170654 C0,6.107131481170654 0,6.107131481170654 0,6.107131481170654 C-0.8278499841690063,6.107131481170654 -1.5,5.434981346130371 -1.5,4.607131481170654 C-1.5,4.607131481170654 -1.5,-4.607131481170654 -1.5,-4.607131481170654 C-1.5,-5.434981346130371 -0.8278499841690063,-6.107131481170654 0,-6.107131481170654 C0,-6.107131481170654 0,-6.107131481170654 0,-6.107131481170654 C0.8278499841690063,-6.107131481170654 1.5,-5.434981346130371 1.5,-4.607131481170654z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-6.245870590209961 C1.5,-6.245870590209961 1.5,6.245870590209961 1.5,6.245870590209961 C1.5,7.073720455169678 0.8278499841690063,7.745870590209961 0,7.745870590209961 C0,7.745870590209961 0,7.745870590209961 0,7.745870590209961 C-0.8278499841690063,7.745870590209961 -1.5,7.073720455169678 -1.5,6.245870590209961 C-1.5,6.245870590209961 -1.5,-6.245870590209961 -1.5,-6.245870590209961 C-1.5,-7.073720455169678 -0.8278499841690063,-7.745870590209961 0,-7.745870590209961 C0,-7.745870590209961 0,-7.745870590209961 0,-7.745870590209961 C0.8278499841690063,-7.745870590209961 1.5,-7.073720455169678 1.5,-6.245870590209961z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-6.245870590209961 C1.5,-6.245870590209961 1.5,6.245870590209961 1.5,6.245870590209961 C1.5,7.073720455169678 0.8278499841690063,7.745870590209961 0,7.745870590209961 C0,7.745870590209961 0,7.745870590209961 0,7.745870590209961 C-0.8278499841690063,7.745870590209961 -1.5,7.073720455169678 -1.5,6.245870590209961 C-1.5,6.245870590209961 -1.5,-6.245870590209961 -1.5,-6.245870590209961 C-1.5,-7.073720455169678 -0.8278499841690063,-7.745870590209961 0,-7.745870590209961 C0,-7.745870590209961 0,-7.745870590209961 0,-7.745870590209961 C0.8278499841690063,-7.745870590209961 1.5,-7.073720455169678 1.5,-6.245870590209961z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.419573783874512 C1.5,-4.419573783874512 1.5,4.419573783874512 1.5,4.419573783874512 C1.5,5.2474236488342285 0.8278499841690063,5.919573783874512 0,5.919573783874512 C0,5.919573783874512 0,5.919573783874512 0,5.919573783874512 C-0.8278499841690063,5.919573783874512 -1.5,5.2474236488342285 -1.5,4.419573783874512 C-1.5,4.419573783874512 -1.5,-4.419573783874512 -1.5,-4.419573783874512 C-1.5,-5.2474236488342285 -0.8278499841690063,-5.919573783874512 0,-5.919573783874512 C0,-5.919573783874512 0,-5.919573783874512 0,-5.919573783874512 C0.8278499841690063,-5.919573783874512 1.5,-5.2474236488342285 1.5,-4.419573783874512z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.419573783874512 C1.5,-4.419573783874512 1.5,4.419573783874512 1.5,4.419573783874512 C1.5,5.2474236488342285 0.8278499841690063,5.919573783874512 0,5.919573783874512 C0,5.919573783874512 0,5.919573783874512 0,5.919573783874512 C-0.8278499841690063,5.919573783874512 -1.5,5.2474236488342285 -1.5,4.419573783874512 C-1.5,4.419573783874512 -1.5,-4.419573783874512 -1.5,-4.419573783874512 C-1.5,-5.2474236488342285 -0.8278499841690063,-5.919573783874512 0,-5.919573783874512 C0,-5.919573783874512 0,-5.919573783874512 0,-5.919573783874512 C0.8278499841690063,-5.919573783874512 1.5,-5.2474236488342285 1.5,-4.419573783874512z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.1096744537353516 C1.5,-3.1096744537353516 1.5,3.1096744537353516 1.5,3.1096744537353516 C1.5,3.9375245571136475 0.8278499841690063,4.609674453735352 0,4.609674453735352 C0,4.609674453735352 0,4.609674453735352 0,4.609674453735352 C-0.8278499841690063,4.609674453735352 -1.5,3.9375245571136475 -1.5,3.1096744537353516 C-1.5,3.1096744537353516 -1.5,-3.1096744537353516 -1.5,-3.1096744537353516 C-1.5,-3.9375245571136475 -0.8278499841690063,-4.609674453735352 0,-4.609674453735352 C0,-4.609674453735352 0,-4.609674453735352 0,-4.609674453735352 C0.8278499841690063,-4.609674453735352 1.5,-3.9375245571136475 1.5,-3.1096744537353516z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.1096744537353516 C1.5,-3.1096744537353516 1.5,3.1096744537353516 1.5,3.1096744537353516 C1.5,3.9375245571136475 0.8278499841690063,4.609674453735352 0,4.609674453735352 C0,4.609674453735352 0,4.609674453735352 0,4.609674453735352 C-0.8278499841690063,4.609674453735352 -1.5,3.9375245571136475 -1.5,3.1096744537353516 C-1.5,3.1096744537353516 -1.5,-3.1096744537353516 -1.5,-3.1096744537353516 C-1.5,-3.9375245571136475 -0.8278499841690063,-4.609674453735352 0,-4.609674453735352 C0,-4.609674453735352 0,-4.609674453735352 0,-4.609674453735352 C0.8278499841690063,-4.609674453735352 1.5,-3.9375245571136475 1.5,-3.1096744537353516z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.9764361381530762 C1.5,-1.9764361381530762 1.5,1.9764361381530762 1.5,1.9764361381530762 C1.5,2.804286241531372 0.8278499841690063,3.476436138153076 0,3.476436138153076 C0,3.476436138153076 0,3.476436138153076 0,3.476436138153076 C-0.8278499841690063,3.476436138153076 -1.5,2.804286241531372 -1.5,1.9764361381530762 C-1.5,1.9764361381530762 -1.5,-1.9764361381530762 -1.5,-1.9764361381530762 C-1.5,-2.804286241531372 -0.8278499841690063,-3.476436138153076 0,-3.476436138153076 C0,-3.476436138153076 0,-3.476436138153076 0,-3.476436138153076 C0.8278499841690063,-3.476436138153076 1.5,-2.804286241531372 1.5,-1.9764361381530762z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.9764361381530762 C1.5,-1.9764361381530762 1.5,1.9764361381530762 1.5,1.9764361381530762 C1.5,2.804286241531372 0.8278499841690063,3.476436138153076 0,3.476436138153076 C0,3.476436138153076 0,3.476436138153076 0,3.476436138153076 C-0.8278499841690063,3.476436138153076 -1.5,2.804286241531372 -1.5,1.9764361381530762 C-1.5,1.9764361381530762 -1.5,-1.9764361381530762 -1.5,-1.9764361381530762 C-1.5,-2.804286241531372 -0.8278499841690063,-3.476436138153076 0,-3.476436138153076 C0,-3.476436138153076 0,-3.476436138153076 0,-3.476436138153076 C0.8278499841690063,-3.476436138153076 1.5,-2.804286241531372 1.5,-1.9764361381530762z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.961399555206299 C1.5,-2.961399555206299 1.5,2.961399555206299 1.5,2.961399555206299 C1.5,3.7892496585845947 0.8278499841690063,4.461399555206299 0,4.461399555206299 C0,4.461399555206299 0,4.461399555206299 0,4.461399555206299 C-0.8278499841690063,4.461399555206299 -1.5,3.7892496585845947 -1.5,2.961399555206299 C-1.5,2.961399555206299 -1.5,-2.961399555206299 -1.5,-2.961399555206299 C-1.5,-3.7892496585845947 -0.8278499841690063,-4.461399555206299 0,-4.461399555206299 C0,-4.461399555206299 0,-4.461399555206299 0,-4.461399555206299 C0.8278499841690063,-4.461399555206299 1.5,-3.7892496585845947 1.5,-2.961399555206299z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.961399555206299 C1.5,-2.961399555206299 1.5,2.961399555206299 1.5,2.961399555206299 C1.5,3.7892496585845947 0.8278499841690063,4.461399555206299 0,4.461399555206299 C0,4.461399555206299 0,4.461399555206299 0,4.461399555206299 C-0.8278499841690063,4.461399555206299 -1.5,3.7892496585845947 -1.5,2.961399555206299 C-1.5,2.961399555206299 -1.5,-2.961399555206299 -1.5,-2.961399555206299 C-1.5,-3.7892496585845947 -0.8278499841690063,-4.461399555206299 0,-4.461399555206299 C0,-4.461399555206299 0,-4.461399555206299 0,-4.461399555206299 C0.8278499841690063,-4.461399555206299 1.5,-3.7892496585845947 1.5,-2.961399555206299z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.2953715324401855 C1.5,-3.2953715324401855 1.5,3.2953715324401855 1.5,3.2953715324401855 C1.5,4.123221397399902 0.8278499841690063,4.7953715324401855 0,4.7953715324401855 C0,4.7953715324401855 0,4.7953715324401855 0,4.7953715324401855 C-0.8278499841690063,4.7953715324401855 -1.5,4.123221397399902 -1.5,3.2953715324401855 C-1.5,3.2953715324401855 -1.5,-3.2953715324401855 -1.5,-3.2953715324401855 C-1.5,-4.123221397399902 -0.8278499841690063,-4.7953715324401855 0,-4.7953715324401855 C0,-4.7953715324401855 0,-4.7953715324401855 0,-4.7953715324401855 C0.8278499841690063,-4.7953715324401855 1.5,-4.123221397399902 1.5,-3.2953715324401855z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.2953715324401855 C1.5,-3.2953715324401855 1.5,3.2953715324401855 1.5,3.2953715324401855 C1.5,4.123221397399902 0.8278499841690063,4.7953715324401855 0,4.7953715324401855 C0,4.7953715324401855 0,4.7953715324401855 0,4.7953715324401855 C-0.8278499841690063,4.7953715324401855 -1.5,4.123221397399902 -1.5,3.2953715324401855 C-1.5,3.2953715324401855 -1.5,-3.2953715324401855 -1.5,-3.2953715324401855 C-1.5,-4.123221397399902 -0.8278499841690063,-4.7953715324401855 0,-4.7953715324401855 C0,-4.7953715324401855 0,-4.7953715324401855 0,-4.7953715324401855 C0.8278499841690063,-4.7953715324401855 1.5,-4.123221397399902 1.5,-3.2953715324401855z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.8902225494384766 C1.5,-2.8902225494384766 1.5,2.8902225494384766 1.5,2.8902225494384766 C1.5,3.7180726528167725 0.8278499841690063,4.390222549438477 0,4.390222549438477 C0,4.390222549438477 0,4.390222549438477 0,4.390222549438477 C-0.8278499841690063,4.390222549438477 -1.5,3.7180726528167725 -1.5,2.8902225494384766 C-1.5,2.8902225494384766 -1.5,-2.8902225494384766 -1.5,-2.8902225494384766 C-1.5,-3.7180726528167725 -0.8278499841690063,-4.390222549438477 0,-4.390222549438477 C0,-4.390222549438477 0,-4.390222549438477 0,-4.390222549438477 C0.8278499841690063,-4.390222549438477 1.5,-3.7180726528167725 1.5,-2.8902225494384766z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8902225494384766 C1.5,-2.8902225494384766 1.5,2.8902225494384766 1.5,2.8902225494384766 C1.5,3.7180726528167725 0.8278499841690063,4.390222549438477 0,4.390222549438477 C0,4.390222549438477 0,4.390222549438477 0,4.390222549438477 C-0.8278499841690063,4.390222549438477 -1.5,3.7180726528167725 -1.5,2.8902225494384766 C-1.5,2.8902225494384766 -1.5,-2.8902225494384766 -1.5,-2.8902225494384766 C-1.5,-3.7180726528167725 -0.8278499841690063,-4.390222549438477 0,-4.390222549438477 C0,-4.390222549438477 0,-4.390222549438477 0,-4.390222549438477 C0.8278499841690063,-4.390222549438477 1.5,-3.7180726528167725 1.5,-2.8902225494384766z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.45634984970092773 C1.5,-0.45634984970092773 1.5,0.45634984970092773 1.5,0.45634984970092773 C1.5,1.284199833869934 0.8278499841690063,1.9563498497009277 0,1.9563498497009277 C0,1.9563498497009277 0,1.9563498497009277 0,1.9563498497009277 C-0.8278499841690063,1.9563498497009277 -1.5,1.284199833869934 -1.5,0.45634984970092773 C-1.5,0.45634984970092773 -1.5,-0.45634984970092773 -1.5,-0.45634984970092773 C-1.5,-1.284199833869934 -0.8278499841690063,-1.9563498497009277 0,-1.9563498497009277 C0,-1.9563498497009277 0,-1.9563498497009277 0,-1.9563498497009277 C0.8278499841690063,-1.9563498497009277 1.5,-1.284199833869934 1.5,-0.45634984970092773z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.45634984970092773 C1.5,-0.45634984970092773 1.5,0.45634984970092773 1.5,0.45634984970092773 C1.5,1.284199833869934 0.8278499841690063,1.9563498497009277 0,1.9563498497009277 C0,1.9563498497009277 0,1.9563498497009277 0,1.9563498497009277 C-0.8278499841690063,1.9563498497009277 -1.5,1.284199833869934 -1.5,0.45634984970092773 C-1.5,0.45634984970092773 -1.5,-0.45634984970092773 -1.5,-0.45634984970092773 C-1.5,-1.284199833869934 -0.8278499841690063,-1.9563498497009277 0,-1.9563498497009277 C0,-1.9563498497009277 0,-1.9563498497009277 0,-1.9563498497009277 C0.8278499841690063,-1.9563498497009277 1.5,-1.284199833869934 1.5,-0.45634984970092773z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_1235">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_1235)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.607131481170654 C1.5,-4.607131481170654 1.5,4.607131481170654 1.5,4.607131481170654 C1.5,5.434981346130371 0.8278499841690063,6.107131481170654 0,6.107131481170654 C0,6.107131481170654 0,6.107131481170654 0,6.107131481170654 C-0.8278499841690063,6.107131481170654 -1.5,5.434981346130371 -1.5,4.607131481170654 C-1.5,4.607131481170654 -1.5,-4.607131481170654 -1.5,-4.607131481170654 C-1.5,-5.434981346130371 -0.8278499841690063,-6.107131481170654 0,-6.107131481170654 C0,-6.107131481170654 0,-6.107131481170654 0,-6.107131481170654 C0.8278499841690063,-6.107131481170654 1.5,-5.434981346130371 1.5,-4.607131481170654z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.607131481170654 C1.5,-4.607131481170654 1.5,4.607131481170654 1.5,4.607131481170654 C1.5,5.434981346130371 0.8278499841690063,6.107131481170654 0,6.107131481170654 C0,6.107131481170654 0,6.107131481170654 0,6.107131481170654 C-0.8278499841690063,6.107131481170654 -1.5,5.434981346130371 -1.5,4.607131481170654 C-1.5,4.607131481170654 -1.5,-4.607131481170654 -1.5,-4.607131481170654 C-1.5,-5.434981346130371 -0.8278499841690063,-6.107131481170654 0,-6.107131481170654 C0,-6.107131481170654 0,-6.107131481170654 0,-6.107131481170654 C0.8278499841690063,-6.107131481170654 1.5,-5.434981346130371 1.5,-4.607131481170654z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-6.245870590209961 C1.5,-6.245870590209961 1.5,6.245870590209961 1.5,6.245870590209961 C1.5,7.073720455169678 0.8278499841690063,7.745870590209961 0,7.745870590209961 C0,7.745870590209961 0,7.745870590209961 0,7.745870590209961 C-0.8278499841690063,7.745870590209961 -1.5,7.073720455169678 -1.5,6.245870590209961 C-1.5,6.245870590209961 -1.5,-6.245870590209961 -1.5,-6.245870590209961 C-1.5,-7.073720455169678 -0.8278499841690063,-7.745870590209961 0,-7.745870590209961 C0,-7.745870590209961 0,-7.745870590209961 0,-7.745870590209961 C0.8278499841690063,-7.745870590209961 1.5,-7.073720455169678 1.5,-6.245870590209961z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-6.245870590209961 C1.5,-6.245870590209961 1.5,6.245870590209961 1.5,6.245870590209961 C1.5,7.073720455169678 0.8278499841690063,7.745870590209961 0,7.745870590209961 C0,7.745870590209961 0,7.745870590209961 0,7.745870590209961 C-0.8278499841690063,7.745870590209961 -1.5,7.073720455169678 -1.5,6.245870590209961 C-1.5,6.245870590209961 -1.5,-6.245870590209961 -1.5,-6.245870590209961 C-1.5,-7.073720455169678 -0.8278499841690063,-7.745870590209961 0,-7.745870590209961 C0,-7.745870590209961 0,-7.745870590209961 0,-7.745870590209961 C0.8278499841690063,-7.745870590209961 1.5,-7.073720455169678 1.5,-6.245870590209961z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-9.591169357299805 C1.5,-9.591169357299805 1.5,9.591169357299805 1.5,9.591169357299805 C1.5,10.41901969909668 0.8278499841690063,11.091169357299805 0,11.091169357299805 C0,11.091169357299805 0,11.091169357299805 0,11.091169357299805 C-0.8278499841690063,11.091169357299805 -1.5,10.41901969909668 -1.5,9.591169357299805 C-1.5,9.591169357299805 -1.5,-9.591169357299805 -1.5,-9.591169357299805 C-1.5,-10.41901969909668 -0.8278499841690063,-11.091169357299805 0,-11.091169357299805 C0,-11.091169357299805 0,-11.091169357299805 0,-11.091169357299805 C0.8278499841690063,-11.091169357299805 1.5,-10.41901969909668 1.5,-9.591169357299805z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.108973979949951 C1.5,-5.108973979949951 1.5,5.108973979949951 1.5,5.108973979949951 C1.5,5.936823844909668 0.8278499841690063,6.608973979949951 0,6.608973979949951 C0,6.608973979949951 0,6.608973979949951 0,6.608973979949951 C-0.8278499841690063,6.608973979949951 -1.5,5.936823844909668 -1.5,5.108973979949951 C-1.5,5.108973979949951 -1.5,-5.108973979949951 -1.5,-5.108973979949951 C-1.5,-5.936823844909668 -0.8278499841690063,-6.608973979949951 0,-6.608973979949951 C0,-6.608973979949951 0,-6.608973979949951 0,-6.608973979949951 C0.8278499841690063,-6.608973979949951 1.5,-5.936823844909668 1.5,-5.108973979949951z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.419573783874512 C1.5,-4.419573783874512 1.5,4.419573783874512 1.5,4.419573783874512 C1.5,5.2474236488342285 0.8278499841690063,5.919573783874512 0,5.919573783874512 C0,5.919573783874512 0,5.919573783874512 0,5.919573783874512 C-0.8278499841690063,5.919573783874512 -1.5,5.2474236488342285 -1.5,4.419573783874512 C-1.5,4.419573783874512 -1.5,-4.419573783874512 -1.5,-4.419573783874512 C-1.5,-5.2474236488342285 -0.8278499841690063,-5.919573783874512 0,-5.919573783874512 C0,-5.919573783874512 0,-5.919573783874512 0,-5.919573783874512 C0.8278499841690063,-5.919573783874512 1.5,-5.2474236488342285 1.5,-4.419573783874512z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.419573783874512 C1.5,-4.419573783874512 1.5,4.419573783874512 1.5,4.419573783874512 C1.5,5.2474236488342285 0.8278499841690063,5.919573783874512 0,5.919573783874512 C0,5.919573783874512 0,5.919573783874512 0,5.919573783874512 C-0.8278499841690063,5.919573783874512 -1.5,5.2474236488342285 -1.5,4.419573783874512 C-1.5,4.419573783874512 -1.5,-4.419573783874512 -1.5,-4.419573783874512 C-1.5,-5.2474236488342285 -0.8278499841690063,-5.919573783874512 0,-5.919573783874512 C0,-5.919573783874512 0,-5.919573783874512 0,-5.919573783874512 C0.8278499841690063,-5.919573783874512 1.5,-5.2474236488342285 1.5,-4.419573783874512z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.1096744537353516 C1.5,-3.1096744537353516 1.5,3.1096744537353516 1.5,3.1096744537353516 C1.5,3.9375245571136475 0.8278499841690063,4.609674453735352 0,4.609674453735352 C0,4.609674453735352 0,4.609674453735352 0,4.609674453735352 C-0.8278499841690063,4.609674453735352 -1.5,3.9375245571136475 -1.5,3.1096744537353516 C-1.5,3.1096744537353516 -1.5,-3.1096744537353516 -1.5,-3.1096744537353516 C-1.5,-3.9375245571136475 -0.8278499841690063,-4.609674453735352 0,-4.609674453735352 C0,-4.609674453735352 0,-4.609674453735352 0,-4.609674453735352 C0.8278499841690063,-4.609674453735352 1.5,-3.9375245571136475 1.5,-3.1096744537353516z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.1096744537353516 C1.5,-3.1096744537353516 1.5,3.1096744537353516 1.5,3.1096744537353516 C1.5,3.9375245571136475 0.8278499841690063,4.609674453735352 0,4.609674453735352 C0,4.609674453735352 0,4.609674453735352 0,4.609674453735352 C-0.8278499841690063,4.609674453735352 -1.5,3.9375245571136475 -1.5,3.1096744537353516 C-1.5,3.1096744537353516 -1.5,-3.1096744537353516 -1.5,-3.1096744537353516 C-1.5,-3.9375245571136475 -0.8278499841690063,-4.609674453735352 0,-4.609674453735352 C0,-4.609674453735352 0,-4.609674453735352 0,-4.609674453735352 C0.8278499841690063,-4.609674453735352 1.5,-3.9375245571136475 1.5,-3.1096744537353516z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.9764361381530762 C1.5,-1.9764361381530762 1.5,1.9764361381530762 1.5,1.9764361381530762 C1.5,2.804286241531372 0.8278499841690063,3.476436138153076 0,3.476436138153076 C0,3.476436138153076 0,3.476436138153076 0,3.476436138153076 C-0.8278499841690063,3.476436138153076 -1.5,2.804286241531372 -1.5,1.9764361381530762 C-1.5,1.9764361381530762 -1.5,-1.9764361381530762 -1.5,-1.9764361381530762 C-1.5,-2.804286241531372 -0.8278499841690063,-3.476436138153076 0,-3.476436138153076 C0,-3.476436138153076 0,-3.476436138153076 0,-3.476436138153076 C0.8278499841690063,-3.476436138153076 1.5,-2.804286241531372 1.5,-1.9764361381530762z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.9764361381530762 C1.5,-1.9764361381530762 1.5,1.9764361381530762 1.5,1.9764361381530762 C1.5,2.804286241531372 0.8278499841690063,3.476436138153076 0,3.476436138153076 C0,3.476436138153076 0,3.476436138153076 0,3.476436138153076 C-0.8278499841690063,3.476436138153076 -1.5,2.804286241531372 -1.5,1.9764361381530762 C-1.5,1.9764361381530762 -1.5,-1.9764361381530762 -1.5,-1.9764361381530762 C-1.5,-2.804286241531372 -0.8278499841690063,-3.476436138153076 0,-3.476436138153076 C0,-3.476436138153076 0,-3.476436138153076 0,-3.476436138153076 C0.8278499841690063,-3.476436138153076 1.5,-2.804286241531372 1.5,-1.9764361381530762z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.961399555206299 C1.5,-2.961399555206299 1.5,2.961399555206299 1.5,2.961399555206299 C1.5,3.7892496585845947 0.8278499841690063,4.461399555206299 0,4.461399555206299 C0,4.461399555206299 0,4.461399555206299 0,4.461399555206299 C-0.8278499841690063,4.461399555206299 -1.5,3.7892496585845947 -1.5,2.961399555206299 C-1.5,2.961399555206299 -1.5,-2.961399555206299 -1.5,-2.961399555206299 C-1.5,-3.7892496585845947 -0.8278499841690063,-4.461399555206299 0,-4.461399555206299 C0,-4.461399555206299 0,-4.461399555206299 0,-4.461399555206299 C0.8278499841690063,-4.461399555206299 1.5,-3.7892496585845947 1.5,-2.961399555206299z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.961399555206299 C1.5,-2.961399555206299 1.5,2.961399555206299 1.5,2.961399555206299 C1.5,3.7892496585845947 0.8278499841690063,4.461399555206299 0,4.461399555206299 C0,4.461399555206299 0,4.461399555206299 0,4.461399555206299 C-0.8278499841690063,4.461399555206299 -1.5,3.7892496585845947 -1.5,2.961399555206299 C-1.5,2.961399555206299 -1.5,-2.961399555206299 -1.5,-2.961399555206299 C-1.5,-3.7892496585845947 -0.8278499841690063,-4.461399555206299 0,-4.461399555206299 C0,-4.461399555206299 0,-4.461399555206299 0,-4.461399555206299 C0.8278499841690063,-4.461399555206299 1.5,-3.7892496585845947 1.5,-2.961399555206299z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.2953715324401855 C1.5,-3.2953715324401855 1.5,3.2953715324401855 1.5,3.2953715324401855 C1.5,4.123221397399902 0.8278499841690063,4.7953715324401855 0,4.7953715324401855 C0,4.7953715324401855 0,4.7953715324401855 0,4.7953715324401855 C-0.8278499841690063,4.7953715324401855 -1.5,4.123221397399902 -1.5,3.2953715324401855 C-1.5,3.2953715324401855 -1.5,-3.2953715324401855 -1.5,-3.2953715324401855 C-1.5,-4.123221397399902 -0.8278499841690063,-4.7953715324401855 0,-4.7953715324401855 C0,-4.7953715324401855 0,-4.7953715324401855 0,-4.7953715324401855 C0.8278499841690063,-4.7953715324401855 1.5,-4.123221397399902 1.5,-3.2953715324401855z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.2953715324401855 C1.5,-3.2953715324401855 1.5,3.2953715324401855 1.5,3.2953715324401855 C1.5,4.123221397399902 0.8278499841690063,4.7953715324401855 0,4.7953715324401855 C0,4.7953715324401855 0,4.7953715324401855 0,4.7953715324401855 C-0.8278499841690063,4.7953715324401855 -1.5,4.123221397399902 -1.5,3.2953715324401855 C-1.5,3.2953715324401855 -1.5,-3.2953715324401855 -1.5,-3.2953715324401855 C-1.5,-4.123221397399902 -0.8278499841690063,-4.7953715324401855 0,-4.7953715324401855 C0,-4.7953715324401855 0,-4.7953715324401855 0,-4.7953715324401855 C0.8278499841690063,-4.7953715324401855 1.5,-4.123221397399902 1.5,-3.2953715324401855z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.8902225494384766 C1.5,-2.8902225494384766 1.5,2.8902225494384766 1.5,2.8902225494384766 C1.5,3.7180726528167725 0.8278499841690063,4.390222549438477 0,4.390222549438477 C0,4.390222549438477 0,4.390222549438477 0,4.390222549438477 C-0.8278499841690063,4.390222549438477 -1.5,3.7180726528167725 -1.5,2.8902225494384766 C-1.5,2.8902225494384766 -1.5,-2.8902225494384766 -1.5,-2.8902225494384766 C-1.5,-3.7180726528167725 -0.8278499841690063,-4.390222549438477 0,-4.390222549438477 C0,-4.390222549438477 0,-4.390222549438477 0,-4.390222549438477 C0.8278499841690063,-4.390222549438477 1.5,-3.7180726528167725 1.5,-2.8902225494384766z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8902225494384766 C1.5,-2.8902225494384766 1.5,2.8902225494384766 1.5,2.8902225494384766 C1.5,3.7180726528167725 0.8278499841690063,4.390222549438477 0,4.390222549438477 C0,4.390222549438477 0,4.390222549438477 0,4.390222549438477 C-0.8278499841690063,4.390222549438477 -1.5,3.7180726528167725 -1.5,2.8902225494384766 C-1.5,2.8902225494384766 -1.5,-2.8902225494384766 -1.5,-2.8902225494384766 C-1.5,-3.7180726528167725 -0.8278499841690063,-4.390222549438477 0,-4.390222549438477 C0,-4.390222549438477 0,-4.390222549438477 0,-4.390222549438477 C0.8278499841690063,-4.390222549438477 1.5,-3.7180726528167725 1.5,-2.8902225494384766z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.364629030227661 C1.5,-2.364629030227661 1.5,2.364629030227661 1.5,2.364629030227661 C1.5,3.192479133605957 0.8278499841690063,3.864629030227661 0,3.864629030227661 C0,3.864629030227661 0,3.864629030227661 0,3.864629030227661 C-0.8278499841690063,3.864629030227661 -1.5,3.192479133605957 -1.5,2.364629030227661 C-1.5,2.364629030227661 -1.5,-2.364629030227661 -1.5,-2.364629030227661 C-1.5,-3.192479133605957 -0.8278499841690063,-3.864629030227661 0,-3.864629030227661 C0,-3.864629030227661 0,-3.864629030227661 0,-3.864629030227661 C0.8278499841690063,-3.864629030227661 1.5,-3.192479133605957 1.5,-2.364629030227661z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.2364912033081055 C1.5,-4.2364912033081055 1.5,4.2364912033081055 1.5,4.2364912033081055 C1.5,5.064341068267822 0.8278499841690063,5.7364912033081055 0,5.7364912033081055 C0,5.7364912033081055 0,5.7364912033081055 0,5.7364912033081055 C-0.8278499841690063,5.7364912033081055 -1.5,5.064341068267822 -1.5,4.2364912033081055 C-1.5,4.2364912033081055 -1.5,-4.2364912033081055 -1.5,-4.2364912033081055 C-1.5,-5.064341068267822 -0.8278499841690063,-5.7364912033081055 0,-5.7364912033081055 C0,-5.7364912033081055 0,-5.7364912033081055 0,-5.7364912033081055 C0.8278499841690063,-5.7364912033081055 1.5,-5.064341068267822 1.5,-4.2364912033081055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.3800976276397705 C1.5,-2.3800976276397705 1.5,2.3800976276397705 1.5,2.3800976276397705 C1.5,3.2079477310180664 0.8278499841690063,3.8800976276397705 0,3.8800976276397705 C0,3.8800976276397705 0,3.8800976276397705 0,3.8800976276397705 C-0.8278499841690063,3.8800976276397705 -1.5,3.2079477310180664 -1.5,2.3800976276397705 C-1.5,2.3800976276397705 -1.5,-2.3800976276397705 -1.5,-2.3800976276397705 C-1.5,-3.2079477310180664 -0.8278499841690063,-3.8800976276397705 0,-3.8800976276397705 C0,-3.8800976276397705 0,-3.8800976276397705 0,-3.8800976276397705 C0.8278499841690063,-3.8800976276397705 1.5,-3.2079477310180664 1.5,-2.3800976276397705z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9267184734344482 C1.5,-0.9267184734344482 1.5,0.9267184734344482 1.5,0.9267184734344482 C1.5,1.7545684576034546 0.8278499841690063,2.4267184734344482 0,2.4267184734344482 C0,2.4267184734344482 0,2.4267184734344482 0,2.4267184734344482 C-0.8278499841690063,2.4267184734344482 -1.5,1.7545684576034546 -1.5,0.9267184734344482 C-1.5,0.9267184734344482 -1.5,-0.9267184734344482 -1.5,-0.9267184734344482 C-1.5,-1.7545684576034546 -0.8278499841690063,-2.4267184734344482 0,-2.4267184734344482 C0,-2.4267184734344482 0,-2.4267184734344482 0,-2.4267184734344482 C0.8278499841690063,-2.4267184734344482 1.5,-1.7545684576034546 1.5,-0.9267184734344482z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.06851863861084 C1.5,-2.06851863861084 1.5,2.06851863861084 1.5,2.06851863861084 C1.5,2.8963687419891357 0.8278499841690063,3.56851863861084 0,3.56851863861084 C0,3.56851863861084 0,3.56851863861084 0,3.56851863861084 C-0.8278499841690063,3.56851863861084 -1.5,2.8963687419891357 -1.5,2.06851863861084 C-1.5,2.06851863861084 -1.5,-2.06851863861084 -1.5,-2.06851863861084 C-1.5,-2.8963687419891357 -0.8278499841690063,-3.56851863861084 0,-3.56851863861084 C0,-3.56851863861084 0,-3.56851863861084 0,-3.56851863861084 C0.8278499841690063,-3.56851863861084 1.5,-2.8963687419891357 1.5,-2.06851863861084z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9819157123565674 C1.5,-0.9819157123565674 1.5,0.9819157123565674 1.5,0.9819157123565674 C1.5,1.8097656965255737 0.8278499841690063,2.4819157123565674 0,2.4819157123565674 C0,2.4819157123565674 0,2.4819157123565674 0,2.4819157123565674 C-0.8278499841690063,2.4819157123565674 -1.5,1.8097656965255737 -1.5,0.9819157123565674 C-1.5,0.9819157123565674 -1.5,-0.9819157123565674 -1.5,-0.9819157123565674 C-1.5,-1.8097656965255737 -0.8278499841690063,-2.4819157123565674 0,-2.4819157123565674 C0,-2.4819157123565674 0,-2.4819157123565674 0,-2.4819157123565674 C0.8278499841690063,-2.4819157123565674 1.5,-1.8097656965255737 1.5,-0.9819157123565674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.04398012161254883 C1.5,-0.04398012161254883 1.5,0.04398012161254883 1.5,0.04398012161254883 C1.5,0.8718301057815552 0.8278499841690063,1.5439801216125488 0,1.5439801216125488 C0,1.5439801216125488 0,1.5439801216125488 0,1.5439801216125488 C-0.8278499841690063,1.5439801216125488 -1.5,0.8718301057815552 -1.5,0.04398012161254883 C-1.5,0.04398012161254883 -1.5,-0.04398012161254883 -1.5,-0.04398012161254883 C-1.5,-0.8718301057815552 -0.8278499841690063,-1.5439801216125488 0,-1.5439801216125488 C0,-1.5439801216125488 0,-1.5439801216125488 0,-1.5439801216125488 C0.8278499841690063,-1.5439801216125488 1.5,-0.8718301057815552 1.5,-0.04398012161254883z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.6828999519348145 C1.5,-2.6828999519348145 1.5,2.6828999519348145 1.5,2.6828999519348145 C1.5,3.5107500553131104 0.8278499841690063,4.1828999519348145 0,4.1828999519348145 C0,4.1828999519348145 0,4.1828999519348145 0,4.1828999519348145 C-0.8278499841690063,4.1828999519348145 -1.5,3.5107500553131104 -1.5,2.6828999519348145 C-1.5,2.6828999519348145 -1.5,-2.6828999519348145 -1.5,-2.6828999519348145 C-1.5,-3.5107500553131104 -0.8278499841690063,-4.1828999519348145 0,-4.1828999519348145 C0,-4.1828999519348145 0,-4.1828999519348145 0,-4.1828999519348145 C0.8278499841690063,-4.1828999519348145 1.5,-3.5107500553131104 1.5,-2.6828999519348145z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.45634984970092773 C1.5,-0.45634984970092773 1.5,0.45634984970092773 1.5,0.45634984970092773 C1.5,1.284199833869934 0.8278499841690063,1.9563498497009277 0,1.9563498497009277 C0,1.9563498497009277 0,1.9563498497009277 0,1.9563498497009277 C-0.8278499841690063,1.9563498497009277 -1.5,1.284199833869934 -1.5,0.45634984970092773 C-1.5,0.45634984970092773 -1.5,-0.45634984970092773 -1.5,-0.45634984970092773 C-1.5,-1.284199833869934 -0.8278499841690063,-1.9563498497009277 0,-1.9563498497009277 C0,-1.9563498497009277 0,-1.9563498497009277 0,-1.9563498497009277 C0.8278499841690063,-1.9563498497009277 1.5,-1.284199833869934 1.5,-0.45634984970092773z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.45634984970092773 C1.5,-0.45634984970092773 1.5,0.45634984970092773 1.5,0.45634984970092773 C1.5,1.284199833869934 0.8278499841690063,1.9563498497009277 0,1.9563498497009277 C0,1.9563498497009277 0,1.9563498497009277 0,1.9563498497009277 C-0.8278499841690063,1.9563498497009277 -1.5,1.284199833869934 -1.5,0.45634984970092773 C-1.5,0.45634984970092773 -1.5,-0.45634984970092773 -1.5,-0.45634984970092773 C-1.5,-1.284199833869934 -0.8278499841690063,-1.9563498497009277 0,-1.9563498497009277 C0,-1.9563498497009277 0,-1.9563498497009277 0,-1.9563498497009277 C0.8278499841690063,-1.9563498497009277 1.5,-1.284199833869934 1.5,-0.45634984970092773z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7111003398895264 C1.5,-0.7111003398895264 1.5,0.7111003398895264 1.5,0.7111003398895264 C1.5,1.5389503240585327 0.8278499841690063,2.2111003398895264 0,2.2111003398895264 C0,2.2111003398895264 0,2.2111003398895264 0,2.2111003398895264 C-0.8278499841690063,2.2111003398895264 -1.5,1.5389503240585327 -1.5,0.7111003398895264 C-1.5,0.7111003398895264 -1.5,-0.7111003398895264 -1.5,-0.7111003398895264 C-1.5,-1.5389503240585327 -0.8278499841690063,-2.2111003398895264 0,-2.2111003398895264 C0,-2.2111003398895264 0,-2.2111003398895264 0,-2.2111003398895264 C0.8278499841690063,-2.2111003398895264 1.5,-1.5389503240585327 1.5,-0.7111003398895264z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <span>Sign in</span>
                                                </button>
                                                <p class="mt-7 leading-[18px]">
                                                    <span class="mr-2">Not a member?</span>
                                                    <button type="button" class="btn_create_account inline-flex items-center font-medium text-[#101010] hover:underline dark:text-white">
                                                        Create account
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-1">
                                                            <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                                                            <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </p>
                                            </div>
                                        </form>
                                        <!------------------------------------------>
                                        <form class="form_create_account space-y-4 px-5 py-6 pb-10 sm:px-8 text-[#7E8084] hidden" method="post" action="<?=Url::to(['user/create_account'])?>">
                                            <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                                            <div>
                                                <div data-v-f669de34="">
                                                    <a href="<?=$url_facebook?>" data-v-f669de34="" type="button" class="btn-auth btn-auth-facebook hidden overflow-hidden lg:flex">
                                                        <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0">

                                           </span>
                                                    </a>
                                                    <a data-v-f669de34="" href="<?=$url_facebook?>" class="btn-auth btn-auth-facebook flex overflow-hidden lg:hidden">
                                                        <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                    <!---->

                                                    <a href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" data-v-f669de34="" type="button" class="btn-auth btn-auth-google mt-4 hidden overflow-hidden lg:flex">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                    <a data-v-f669de34="" href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" class="btn-auth btn-auth-google mt-4 flex overflow-hidden lg:hidden">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                </div>
                                                <div class="my-8 flex items-center text-[#7F828A]"><span class="h-px w-full grow bg-[#ddd]"></span> <span class="whitespace-nowrap px-4">or create account using email</span> <span class="h-px w-full grow bg-[#ddd]"></span></div>
                                            </div>
                                            <!--<div class="flex space-x-4">-->
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="text" name="fullname"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Full name</span></label> <!---->
                                                </div>
                                            </div>
                                            <!--<div class="w-1/2">
                                         <div data-v-06f78498="" class="floatlabel">
                                            <input data-v-06f78498="" placeholder=" " type="text"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Last name</span></label>
                                         </div>
                                      </div>-->
                                            <!--</div>-->
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="text" name="email"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Email address</span></label> <!---->
                                                </div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="password" name="password"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Password</span></label> <!---->
                                                </div>
                                                <p class="mt-1 ml-4 text-xs font-medium text-[#7F828A]">8+ characters, at least 1 symbol</p>
                                            </div>
                                            <div class="!mt-6 flex items-center">
                                                <div value="" class="shrink-0 font-medium text-[#101010] dark:text-white">
                                                    <div class="toggle-new flex w-full items-center">
                                                        <label class="flex cursor-pointer items-center">
                                                            <div class="relative">
                                                                <input type="checkbox" class="sr-only" name="termsofuse">
                                                                <div class="line block h-7 w-12 rounded-full border-2 border-[#0A0A0A] bg-white transition duration-500"></div>
                                                                <div class="dot absolute left-[5px] top-[5px] h-[18px] w-4.5 rounded-full bg-[#515258] transition duration-500"></div>
                                                            </div>
                                                        </label>
                                                        <div class="ml-3">
                                                            I agree to the <!--<a target="_blank" href="<?=Url::to(['page/terms'])?>" class="underline hover:no-underline">Terms</a> &amp;-->
                                                            <a target="_blank" href="<?=Url::to(['page/privacy'])?>" class="underline hover:no-underline">Pivacy Policy</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="!mt-5 text-center">
                                                <button type="submit" class="btn btn-auth w-full rounded-[5px] py-2.5 text-[17px] leading-[26px]">
                                                    <div style="display: none;">
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent; display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_277">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_277)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-17.94794273376465 C1.5,-17.94794273376465 1.5,17.94794273376465 1.5,17.94794273376465 C1.5,18.775793075561523 0.8278499841690063,19.44794273376465 0,19.44794273376465 C0,19.44794273376465 0,19.44794273376465 0,19.44794273376465 C-0.8278499841690063,19.44794273376465 -1.5,18.775793075561523 -1.5,17.94794273376465 C-1.5,17.94794273376465 -1.5,-17.94794273376465 -1.5,-17.94794273376465 C-1.5,-18.775793075561523 -0.8278499841690063,-19.44794273376465 0,-19.44794273376465 C0,-19.44794273376465 0,-19.44794273376465 0,-19.44794273376465 C0.8278499841690063,-19.44794273376465 1.5,-18.775793075561523 1.5,-17.94794273376465z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-17.94794273376465 C1.5,-17.94794273376465 1.5,17.94794273376465 1.5,17.94794273376465 C1.5,18.775793075561523 0.8278499841690063,19.44794273376465 0,19.44794273376465 C0,19.44794273376465 0,19.44794273376465 0,19.44794273376465 C-0.8278499841690063,19.44794273376465 -1.5,18.775793075561523 -1.5,17.94794273376465 C-1.5,17.94794273376465 -1.5,-17.94794273376465 -1.5,-17.94794273376465 C-1.5,-18.775793075561523 -0.8278499841690063,-19.44794273376465 0,-19.44794273376465 C0,-19.44794273376465 0,-19.44794273376465 0,-19.44794273376465 C0.8278499841690063,-19.44794273376465 1.5,-18.775793075561523 1.5,-17.94794273376465z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-11.667767524719238 C1.5,-11.667767524719238 1.5,11.667767524719238 1.5,11.667767524719238 C1.5,12.495617866516113 0.8278499841690063,13.167767524719238 0,13.167767524719238 C0,13.167767524719238 0,13.167767524719238 0,13.167767524719238 C-0.8278499841690063,13.167767524719238 -1.5,12.495617866516113 -1.5,11.667767524719238 C-1.5,11.667767524719238 -1.5,-11.667767524719238 -1.5,-11.667767524719238 C-1.5,-12.495617866516113 -0.8278499841690063,-13.167767524719238 0,-13.167767524719238 C0,-13.167767524719238 0,-13.167767524719238 0,-13.167767524719238 C0.8278499841690063,-13.167767524719238 1.5,-12.495617866516113 1.5,-11.667767524719238z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-11.667767524719238 C1.5,-11.667767524719238 1.5,11.667767524719238 1.5,11.667767524719238 C1.5,12.495617866516113 0.8278499841690063,13.167767524719238 0,13.167767524719238 C0,13.167767524719238 0,13.167767524719238 0,13.167767524719238 C-0.8278499841690063,13.167767524719238 -1.5,12.495617866516113 -1.5,11.667767524719238 C-1.5,11.667767524719238 -1.5,-11.667767524719238 -1.5,-11.667767524719238 C-1.5,-12.495617866516113 -0.8278499841690063,-13.167767524719238 0,-13.167767524719238 C0,-13.167767524719238 0,-13.167767524719238 0,-13.167767524719238 C0.8278499841690063,-13.167767524719238 1.5,-12.495617866516113 1.5,-11.667767524719238z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.1540462970733643 C1.5,-2.1540462970733643 1.5,2.1540462970733643 1.5,2.1540462970733643 C1.5,2.98189640045166 0.8278499841690063,3.6540462970733643 0,3.6540462970733643 C0,3.6540462970733643 0,3.6540462970733643 0,3.6540462970733643 C-0.8278499841690063,3.6540462970733643 -1.5,2.98189640045166 -1.5,2.1540462970733643 C-1.5,2.1540462970733643 -1.5,-2.1540462970733643 -1.5,-2.1540462970733643 C-1.5,-2.98189640045166 -0.8278499841690063,-3.6540462970733643 0,-3.6540462970733643 C0,-3.6540462970733643 0,-3.6540462970733643 0,-3.6540462970733643 C0.8278499841690063,-3.6540462970733643 1.5,-2.98189640045166 1.5,-2.1540462970733643z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.1540462970733643 C1.5,-2.1540462970733643 1.5,2.1540462970733643 1.5,2.1540462970733643 C1.5,2.98189640045166 0.8278499841690063,3.6540462970733643 0,3.6540462970733643 C0,3.6540462970733643 0,3.6540462970733643 0,3.6540462970733643 C-0.8278499841690063,3.6540462970733643 -1.5,2.98189640045166 -1.5,2.1540462970733643 C-1.5,2.1540462970733643 -1.5,-2.1540462970733643 -1.5,-2.1540462970733643 C-1.5,-2.98189640045166 -0.8278499841690063,-3.6540462970733643 0,-3.6540462970733643 C0,-3.6540462970733643 0,-3.6540462970733643 0,-3.6540462970733643 C0.8278499841690063,-3.6540462970733643 1.5,-2.98189640045166 1.5,-2.1540462970733643z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.458975076675415 C1.5,-1.458975076675415 1.5,1.458975076675415 1.5,1.458975076675415 C1.5,2.286825180053711 0.8278499841690063,2.958975076675415 0,2.958975076675415 C0,2.958975076675415 0,2.958975076675415 0,2.958975076675415 C-0.8278499841690063,2.958975076675415 -1.5,2.286825180053711 -1.5,1.458975076675415 C-1.5,1.458975076675415 -1.5,-1.458975076675415 -1.5,-1.458975076675415 C-1.5,-2.286825180053711 -0.8278499841690063,-2.958975076675415 0,-2.958975076675415 C0,-2.958975076675415 0,-2.958975076675415 0,-2.958975076675415 C0.8278499841690063,-2.958975076675415 1.5,-2.286825180053711 1.5,-1.458975076675415z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.458975076675415 C1.5,-1.458975076675415 1.5,1.458975076675415 1.5,1.458975076675415 C1.5,2.286825180053711 0.8278499841690063,2.958975076675415 0,2.958975076675415 C0,2.958975076675415 0,2.958975076675415 0,2.958975076675415 C-0.8278499841690063,2.958975076675415 -1.5,2.286825180053711 -1.5,1.458975076675415 C-1.5,1.458975076675415 -1.5,-1.458975076675415 -1.5,-1.458975076675415 C-1.5,-2.286825180053711 -0.8278499841690063,-2.958975076675415 0,-2.958975076675415 C0,-2.958975076675415 0,-2.958975076675415 0,-2.958975076675415 C0.8278499841690063,-2.958975076675415 1.5,-2.286825180053711 1.5,-1.458975076675415z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.984253406524658 C1.5,-2.984253406524658 1.5,2.984253406524658 1.5,2.984253406524658 C1.5,3.812103509902954 0.8278499841690063,4.484253406524658 0,4.484253406524658 C0,4.484253406524658 0,4.484253406524658 0,4.484253406524658 C-0.8278499841690063,4.484253406524658 -1.5,3.812103509902954 -1.5,2.984253406524658 C-1.5,2.984253406524658 -1.5,-2.984253406524658 -1.5,-2.984253406524658 C-1.5,-3.812103509902954 -0.8278499841690063,-4.484253406524658 0,-4.484253406524658 C0,-4.484253406524658 0,-4.484253406524658 0,-4.484253406524658 C0.8278499841690063,-4.484253406524658 1.5,-3.812103509902954 1.5,-2.984253406524658z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.984253406524658 C1.5,-2.984253406524658 1.5,2.984253406524658 1.5,2.984253406524658 C1.5,3.812103509902954 0.8278499841690063,4.484253406524658 0,4.484253406524658 C0,4.484253406524658 0,4.484253406524658 0,4.484253406524658 C-0.8278499841690063,4.484253406524658 -1.5,3.812103509902954 -1.5,2.984253406524658 C-1.5,2.984253406524658 -1.5,-2.984253406524658 -1.5,-2.984253406524658 C-1.5,-3.812103509902954 -0.8278499841690063,-4.484253406524658 0,-4.484253406524658 C0,-4.484253406524658 0,-4.484253406524658 0,-4.484253406524658 C0.8278499841690063,-4.484253406524658 1.5,-3.812103509902954 1.5,-2.984253406524658z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.17380762100219727 C1.5,-0.17380762100219727 1.5,0.17380762100219727 1.5,0.17380762100219727 C1.5,1.0016576051712036 0.8278499841690063,1.6738076210021973 0,1.6738076210021973 C0,1.6738076210021973 0,1.6738076210021973 0,1.6738076210021973 C-0.8278499841690063,1.6738076210021973 -1.5,1.0016576051712036 -1.5,0.17380762100219727 C-1.5,0.17380762100219727 -1.5,-0.17380762100219727 -1.5,-0.17380762100219727 C-1.5,-1.0016576051712036 -0.8278499841690063,-1.6738076210021973 0,-1.6738076210021973 C0,-1.6738076210021973 0,-1.6738076210021973 0,-1.6738076210021973 C0.8278499841690063,-1.6738076210021973 1.5,-1.0016576051712036 1.5,-0.17380762100219727z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.17380762100219727 C1.5,-0.17380762100219727 1.5,0.17380762100219727 1.5,0.17380762100219727 C1.5,1.0016576051712036 0.8278499841690063,1.6738076210021973 0,1.6738076210021973 C0,1.6738076210021973 0,1.6738076210021973 0,1.6738076210021973 C-0.8278499841690063,1.6738076210021973 -1.5,1.0016576051712036 -1.5,0.17380762100219727 C-1.5,0.17380762100219727 -1.5,-0.17380762100219727 -1.5,-0.17380762100219727 C-1.5,-1.0016576051712036 -0.8278499841690063,-1.6738076210021973 0,-1.6738076210021973 C0,-1.6738076210021973 0,-1.6738076210021973 0,-1.6738076210021973 C0.8278499841690063,-1.6738076210021973 1.5,-1.0016576051712036 1.5,-0.17380762100219727z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.21861577033996582 C1.5,-0.21861577033996582 1.5,0.21861577033996582 1.5,0.21861577033996582 C1.5,1.0464657545089722 0.8278499841690063,1.7186157703399658 0,1.7186157703399658 C0,1.7186157703399658 0,1.7186157703399658 0,1.7186157703399658 C-0.8278499841690063,1.7186157703399658 -1.5,1.0464657545089722 -1.5,0.21861577033996582 C-1.5,0.21861577033996582 -1.5,-0.21861577033996582 -1.5,-0.21861577033996582 C-1.5,-1.0464657545089722 -0.8278499841690063,-1.7186157703399658 0,-1.7186157703399658 C0,-1.7186157703399658 0,-1.7186157703399658 0,-1.7186157703399658 C0.8278499841690063,-1.7186157703399658 1.5,-1.0464657545089722 1.5,-0.21861577033996582z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.21861577033996582 C1.5,-0.21861577033996582 1.5,0.21861577033996582 1.5,0.21861577033996582 C1.5,1.0464657545089722 0.8278499841690063,1.7186157703399658 0,1.7186157703399658 C0,1.7186157703399658 0,1.7186157703399658 0,1.7186157703399658 C-0.8278499841690063,1.7186157703399658 -1.5,1.0464657545089722 -1.5,0.21861577033996582 C-1.5,0.21861577033996582 -1.5,-0.21861577033996582 -1.5,-0.21861577033996582 C-1.5,-1.0464657545089722 -0.8278499841690063,-1.7186157703399658 0,-1.7186157703399658 C0,-1.7186157703399658 0,-1.7186157703399658 0,-1.7186157703399658 C0.8278499841690063,-1.7186157703399658 1.5,-1.0464657545089722 1.5,-0.21861577033996582z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.825676441192627 C1.5,-2.825676441192627 1.5,2.825676441192627 1.5,2.825676441192627 C1.5,3.653526544570923 0.8278499841690063,4.325676441192627 0,4.325676441192627 C0,4.325676441192627 0,4.325676441192627 0,4.325676441192627 C-0.8278499841690063,4.325676441192627 -1.5,3.653526544570923 -1.5,2.825676441192627 C-1.5,2.825676441192627 -1.5,-2.825676441192627 -1.5,-2.825676441192627 C-1.5,-3.653526544570923 -0.8278499841690063,-4.325676441192627 0,-4.325676441192627 C0,-4.325676441192627 0,-4.325676441192627 0,-4.325676441192627 C0.8278499841690063,-4.325676441192627 1.5,-3.653526544570923 1.5,-2.825676441192627z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.825676441192627 C1.5,-2.825676441192627 1.5,2.825676441192627 1.5,2.825676441192627 C1.5,3.653526544570923 0.8278499841690063,4.325676441192627 0,4.325676441192627 C0,4.325676441192627 0,4.325676441192627 0,4.325676441192627 C-0.8278499841690063,4.325676441192627 -1.5,3.653526544570923 -1.5,2.825676441192627 C-1.5,2.825676441192627 -1.5,-2.825676441192627 -1.5,-2.825676441192627 C-1.5,-3.653526544570923 -0.8278499841690063,-4.325676441192627 0,-4.325676441192627 C0,-4.325676441192627 0,-4.325676441192627 0,-4.325676441192627 C0.8278499841690063,-4.325676441192627 1.5,-3.653526544570923 1.5,-2.825676441192627z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.1890779733657837 C1.5,-0.1890779733657837 1.5,0.1890779733657837 1.5,0.1890779733657837 C1.5,1.01692795753479 0.8278499841690063,1.6890779733657837 0,1.6890779733657837 C0,1.6890779733657837 0,1.6890779733657837 0,1.6890779733657837 C-0.8278499841690063,1.6890779733657837 -1.5,1.01692795753479 -1.5,0.1890779733657837 C-1.5,0.1890779733657837 -1.5,-0.1890779733657837 -1.5,-0.1890779733657837 C-1.5,-1.01692795753479 -0.8278499841690063,-1.6890779733657837 0,-1.6890779733657837 C0,-1.6890779733657837 0,-1.6890779733657837 0,-1.6890779733657837 C0.8278499841690063,-1.6890779733657837 1.5,-1.01692795753479 1.5,-0.1890779733657837z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1890779733657837 C1.5,-0.1890779733657837 1.5,0.1890779733657837 1.5,0.1890779733657837 C1.5,1.01692795753479 0.8278499841690063,1.6890779733657837 0,1.6890779733657837 C0,1.6890779733657837 0,1.6890779733657837 0,1.6890779733657837 C-0.8278499841690063,1.6890779733657837 -1.5,1.01692795753479 -1.5,0.1890779733657837 C-1.5,0.1890779733657837 -1.5,-0.1890779733657837 -1.5,-0.1890779733657837 C-1.5,-1.01692795753479 -0.8278499841690063,-1.6890779733657837 0,-1.6890779733657837 C0,-1.6890779733657837 0,-1.6890779733657837 0,-1.6890779733657837 C0.8278499841690063,-1.6890779733657837 1.5,-1.01692795753479 1.5,-0.1890779733657837z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_413">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_413)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-17.94794273376465 C1.5,-17.94794273376465 1.5,17.94794273376465 1.5,17.94794273376465 C1.5,18.775793075561523 0.8278499841690063,19.44794273376465 0,19.44794273376465 C0,19.44794273376465 0,19.44794273376465 0,19.44794273376465 C-0.8278499841690063,19.44794273376465 -1.5,18.775793075561523 -1.5,17.94794273376465 C-1.5,17.94794273376465 -1.5,-17.94794273376465 -1.5,-17.94794273376465 C-1.5,-18.775793075561523 -0.8278499841690063,-19.44794273376465 0,-19.44794273376465 C0,-19.44794273376465 0,-19.44794273376465 0,-19.44794273376465 C0.8278499841690063,-19.44794273376465 1.5,-18.775793075561523 1.5,-17.94794273376465z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-17.94794273376465 C1.5,-17.94794273376465 1.5,17.94794273376465 1.5,17.94794273376465 C1.5,18.775793075561523 0.8278499841690063,19.44794273376465 0,19.44794273376465 C0,19.44794273376465 0,19.44794273376465 0,19.44794273376465 C-0.8278499841690063,19.44794273376465 -1.5,18.775793075561523 -1.5,17.94794273376465 C-1.5,17.94794273376465 -1.5,-17.94794273376465 -1.5,-17.94794273376465 C-1.5,-18.775793075561523 -0.8278499841690063,-19.44794273376465 0,-19.44794273376465 C0,-19.44794273376465 0,-19.44794273376465 0,-19.44794273376465 C0.8278499841690063,-19.44794273376465 1.5,-18.775793075561523 1.5,-17.94794273376465z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-11.667767524719238 C1.5,-11.667767524719238 1.5,11.667767524719238 1.5,11.667767524719238 C1.5,12.495617866516113 0.8278499841690063,13.167767524719238 0,13.167767524719238 C0,13.167767524719238 0,13.167767524719238 0,13.167767524719238 C-0.8278499841690063,13.167767524719238 -1.5,12.495617866516113 -1.5,11.667767524719238 C-1.5,11.667767524719238 -1.5,-11.667767524719238 -1.5,-11.667767524719238 C-1.5,-12.495617866516113 -0.8278499841690063,-13.167767524719238 0,-13.167767524719238 C0,-13.167767524719238 0,-13.167767524719238 0,-13.167767524719238 C0.8278499841690063,-13.167767524719238 1.5,-12.495617866516113 1.5,-11.667767524719238z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-11.667767524719238 C1.5,-11.667767524719238 1.5,11.667767524719238 1.5,11.667767524719238 C1.5,12.495617866516113 0.8278499841690063,13.167767524719238 0,13.167767524719238 C0,13.167767524719238 0,13.167767524719238 0,13.167767524719238 C-0.8278499841690063,13.167767524719238 -1.5,12.495617866516113 -1.5,11.667767524719238 C-1.5,11.667767524719238 -1.5,-11.667767524719238 -1.5,-11.667767524719238 C-1.5,-12.495617866516113 -0.8278499841690063,-13.167767524719238 0,-13.167767524719238 C0,-13.167767524719238 0,-13.167767524719238 0,-13.167767524719238 C0.8278499841690063,-13.167767524719238 1.5,-12.495617866516113 1.5,-11.667767524719238z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-10.570597648620605 C1.5,-10.570597648620605 1.5,10.570597648620605 1.5,10.570597648620605 C1.5,11.39844799041748 0.8278499841690063,12.070597648620605 0,12.070597648620605 C0,12.070597648620605 0,12.070597648620605 0,12.070597648620605 C-0.8278499841690063,12.070597648620605 -1.5,11.39844799041748 -1.5,10.570597648620605 C-1.5,10.570597648620605 -1.5,-10.570597648620605 -1.5,-10.570597648620605 C-1.5,-11.39844799041748 -0.8278499841690063,-12.070597648620605 0,-12.070597648620605 C0,-12.070597648620605 0,-12.070597648620605 0,-12.070597648620605 C0.8278499841690063,-12.070597648620605 1.5,-11.39844799041748 1.5,-10.570597648620605z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.1540462970733643 C1.5,-2.1540462970733643 1.5,2.1540462970733643 1.5,2.1540462970733643 C1.5,2.98189640045166 0.8278499841690063,3.6540462970733643 0,3.6540462970733643 C0,3.6540462970733643 0,3.6540462970733643 0,3.6540462970733643 C-0.8278499841690063,3.6540462970733643 -1.5,2.98189640045166 -1.5,2.1540462970733643 C-1.5,2.1540462970733643 -1.5,-2.1540462970733643 -1.5,-2.1540462970733643 C-1.5,-2.98189640045166 -0.8278499841690063,-3.6540462970733643 0,-3.6540462970733643 C0,-3.6540462970733643 0,-3.6540462970733643 0,-3.6540462970733643 C0.8278499841690063,-3.6540462970733643 1.5,-2.98189640045166 1.5,-2.1540462970733643z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.1540462970733643 C1.5,-2.1540462970733643 1.5,2.1540462970733643 1.5,2.1540462970733643 C1.5,2.98189640045166 0.8278499841690063,3.6540462970733643 0,3.6540462970733643 C0,3.6540462970733643 0,3.6540462970733643 0,3.6540462970733643 C-0.8278499841690063,3.6540462970733643 -1.5,2.98189640045166 -1.5,2.1540462970733643 C-1.5,2.1540462970733643 -1.5,-2.1540462970733643 -1.5,-2.1540462970733643 C-1.5,-2.98189640045166 -0.8278499841690063,-3.6540462970733643 0,-3.6540462970733643 C0,-3.6540462970733643 0,-3.6540462970733643 0,-3.6540462970733643 C0.8278499841690063,-3.6540462970733643 1.5,-2.98189640045166 1.5,-2.1540462970733643z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.458975076675415 C1.5,-1.458975076675415 1.5,1.458975076675415 1.5,1.458975076675415 C1.5,2.286825180053711 0.8278499841690063,2.958975076675415 0,2.958975076675415 C0,2.958975076675415 0,2.958975076675415 0,2.958975076675415 C-0.8278499841690063,2.958975076675415 -1.5,2.286825180053711 -1.5,1.458975076675415 C-1.5,1.458975076675415 -1.5,-1.458975076675415 -1.5,-1.458975076675415 C-1.5,-2.286825180053711 -0.8278499841690063,-2.958975076675415 0,-2.958975076675415 C0,-2.958975076675415 0,-2.958975076675415 0,-2.958975076675415 C0.8278499841690063,-2.958975076675415 1.5,-2.286825180053711 1.5,-1.458975076675415z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.458975076675415 C1.5,-1.458975076675415 1.5,1.458975076675415 1.5,1.458975076675415 C1.5,2.286825180053711 0.8278499841690063,2.958975076675415 0,2.958975076675415 C0,2.958975076675415 0,2.958975076675415 0,2.958975076675415 C-0.8278499841690063,2.958975076675415 -1.5,2.286825180053711 -1.5,1.458975076675415 C-1.5,1.458975076675415 -1.5,-1.458975076675415 -1.5,-1.458975076675415 C-1.5,-2.286825180053711 -0.8278499841690063,-2.958975076675415 0,-2.958975076675415 C0,-2.958975076675415 0,-2.958975076675415 0,-2.958975076675415 C0.8278499841690063,-2.958975076675415 1.5,-2.286825180053711 1.5,-1.458975076675415z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.984253406524658 C1.5,-2.984253406524658 1.5,2.984253406524658 1.5,2.984253406524658 C1.5,3.812103509902954 0.8278499841690063,4.484253406524658 0,4.484253406524658 C0,4.484253406524658 0,4.484253406524658 0,4.484253406524658 C-0.8278499841690063,4.484253406524658 -1.5,3.812103509902954 -1.5,2.984253406524658 C-1.5,2.984253406524658 -1.5,-2.984253406524658 -1.5,-2.984253406524658 C-1.5,-3.812103509902954 -0.8278499841690063,-4.484253406524658 0,-4.484253406524658 C0,-4.484253406524658 0,-4.484253406524658 0,-4.484253406524658 C0.8278499841690063,-4.484253406524658 1.5,-3.812103509902954 1.5,-2.984253406524658z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.984253406524658 C1.5,-2.984253406524658 1.5,2.984253406524658 1.5,2.984253406524658 C1.5,3.812103509902954 0.8278499841690063,4.484253406524658 0,4.484253406524658 C0,4.484253406524658 0,4.484253406524658 0,4.484253406524658 C-0.8278499841690063,4.484253406524658 -1.5,3.812103509902954 -1.5,2.984253406524658 C-1.5,2.984253406524658 -1.5,-2.984253406524658 -1.5,-2.984253406524658 C-1.5,-3.812103509902954 -0.8278499841690063,-4.484253406524658 0,-4.484253406524658 C0,-4.484253406524658 0,-4.484253406524658 0,-4.484253406524658 C0.8278499841690063,-4.484253406524658 1.5,-3.812103509902954 1.5,-2.984253406524658z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.17380762100219727 C1.5,-0.17380762100219727 1.5,0.17380762100219727 1.5,0.17380762100219727 C1.5,1.0016576051712036 0.8278499841690063,1.6738076210021973 0,1.6738076210021973 C0,1.6738076210021973 0,1.6738076210021973 0,1.6738076210021973 C-0.8278499841690063,1.6738076210021973 -1.5,1.0016576051712036 -1.5,0.17380762100219727 C-1.5,0.17380762100219727 -1.5,-0.17380762100219727 -1.5,-0.17380762100219727 C-1.5,-1.0016576051712036 -0.8278499841690063,-1.6738076210021973 0,-1.6738076210021973 C0,-1.6738076210021973 0,-1.6738076210021973 0,-1.6738076210021973 C0.8278499841690063,-1.6738076210021973 1.5,-1.0016576051712036 1.5,-0.17380762100219727z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.17380762100219727 C1.5,-0.17380762100219727 1.5,0.17380762100219727 1.5,0.17380762100219727 C1.5,1.0016576051712036 0.8278499841690063,1.6738076210021973 0,1.6738076210021973 C0,1.6738076210021973 0,1.6738076210021973 0,1.6738076210021973 C-0.8278499841690063,1.6738076210021973 -1.5,1.0016576051712036 -1.5,0.17380762100219727 C-1.5,0.17380762100219727 -1.5,-0.17380762100219727 -1.5,-0.17380762100219727 C-1.5,-1.0016576051712036 -0.8278499841690063,-1.6738076210021973 0,-1.6738076210021973 C0,-1.6738076210021973 0,-1.6738076210021973 0,-1.6738076210021973 C0.8278499841690063,-1.6738076210021973 1.5,-1.0016576051712036 1.5,-0.17380762100219727z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.21861577033996582 C1.5,-0.21861577033996582 1.5,0.21861577033996582 1.5,0.21861577033996582 C1.5,1.0464657545089722 0.8278499841690063,1.7186157703399658 0,1.7186157703399658 C0,1.7186157703399658 0,1.7186157703399658 0,1.7186157703399658 C-0.8278499841690063,1.7186157703399658 -1.5,1.0464657545089722 -1.5,0.21861577033996582 C-1.5,0.21861577033996582 -1.5,-0.21861577033996582 -1.5,-0.21861577033996582 C-1.5,-1.0464657545089722 -0.8278499841690063,-1.7186157703399658 0,-1.7186157703399658 C0,-1.7186157703399658 0,-1.7186157703399658 0,-1.7186157703399658 C0.8278499841690063,-1.7186157703399658 1.5,-1.0464657545089722 1.5,-0.21861577033996582z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.21861577033996582 C1.5,-0.21861577033996582 1.5,0.21861577033996582 1.5,0.21861577033996582 C1.5,1.0464657545089722 0.8278499841690063,1.7186157703399658 0,1.7186157703399658 C0,1.7186157703399658 0,1.7186157703399658 0,1.7186157703399658 C-0.8278499841690063,1.7186157703399658 -1.5,1.0464657545089722 -1.5,0.21861577033996582 C-1.5,0.21861577033996582 -1.5,-0.21861577033996582 -1.5,-0.21861577033996582 C-1.5,-1.0464657545089722 -0.8278499841690063,-1.7186157703399658 0,-1.7186157703399658 C0,-1.7186157703399658 0,-1.7186157703399658 0,-1.7186157703399658 C0.8278499841690063,-1.7186157703399658 1.5,-1.0464657545089722 1.5,-0.21861577033996582z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.825676441192627 C1.5,-2.825676441192627 1.5,2.825676441192627 1.5,2.825676441192627 C1.5,3.653526544570923 0.8278499841690063,4.325676441192627 0,4.325676441192627 C0,4.325676441192627 0,4.325676441192627 0,4.325676441192627 C-0.8278499841690063,4.325676441192627 -1.5,3.653526544570923 -1.5,2.825676441192627 C-1.5,2.825676441192627 -1.5,-2.825676441192627 -1.5,-2.825676441192627 C-1.5,-3.653526544570923 -0.8278499841690063,-4.325676441192627 0,-4.325676441192627 C0,-4.325676441192627 0,-4.325676441192627 0,-4.325676441192627 C0.8278499841690063,-4.325676441192627 1.5,-3.653526544570923 1.5,-2.825676441192627z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.825676441192627 C1.5,-2.825676441192627 1.5,2.825676441192627 1.5,2.825676441192627 C1.5,3.653526544570923 0.8278499841690063,4.325676441192627 0,4.325676441192627 C0,4.325676441192627 0,4.325676441192627 0,4.325676441192627 C-0.8278499841690063,4.325676441192627 -1.5,3.653526544570923 -1.5,2.825676441192627 C-1.5,2.825676441192627 -1.5,-2.825676441192627 -1.5,-2.825676441192627 C-1.5,-3.653526544570923 -0.8278499841690063,-4.325676441192627 0,-4.325676441192627 C0,-4.325676441192627 0,-4.325676441192627 0,-4.325676441192627 C0.8278499841690063,-4.325676441192627 1.5,-3.653526544570923 1.5,-2.825676441192627z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.4503529071807861 C1.5,-1.4503529071807861 1.5,1.4503529071807861 1.5,1.4503529071807861 C1.5,2.278203010559082 0.8278499841690063,2.950352907180786 0,2.950352907180786 C0,2.950352907180786 0,2.950352907180786 0,2.950352907180786 C-0.8278499841690063,2.950352907180786 -1.5,2.278203010559082 -1.5,1.4503529071807861 C-1.5,1.4503529071807861 -1.5,-1.4503529071807861 -1.5,-1.4503529071807861 C-1.5,-2.278203010559082 -0.8278499841690063,-2.950352907180786 0,-2.950352907180786 C0,-2.950352907180786 0,-2.950352907180786 0,-2.950352907180786 C0.8278499841690063,-2.950352907180786 1.5,-2.278203010559082 1.5,-1.4503529071807861z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.6549816131591797 C1.5,-3.6549816131591797 1.5,3.6549816131591797 1.5,3.6549816131591797 C1.5,4.4828314781188965 0.8278499841690063,5.15498161315918 0,5.15498161315918 C0,5.15498161315918 0,5.15498161315918 0,5.15498161315918 C-0.8278499841690063,5.15498161315918 -1.5,4.4828314781188965 -1.5,3.6549816131591797 C-1.5,3.6549816131591797 -1.5,-3.6549816131591797 -1.5,-3.6549816131591797 C-1.5,-4.4828314781188965 -0.8278499841690063,-5.15498161315918 0,-5.15498161315918 C0,-5.15498161315918 0,-5.15498161315918 0,-5.15498161315918 C0.8278499841690063,-5.15498161315918 1.5,-4.4828314781188965 1.5,-3.6549816131591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.457521438598633 C1.5,-4.457521438598633 1.5,4.457521438598633 1.5,4.457521438598633 C1.5,5.28537130355835 0.8278499841690063,5.957521438598633 0,5.957521438598633 C0,5.957521438598633 0,5.957521438598633 0,5.957521438598633 C-0.8278499841690063,5.957521438598633 -1.5,5.28537130355835 -1.5,4.457521438598633 C-1.5,4.457521438598633 -1.5,-4.457521438598633 -1.5,-4.457521438598633 C-1.5,-5.28537130355835 -0.8278499841690063,-5.957521438598633 0,-5.957521438598633 C0,-5.957521438598633 0,-5.957521438598633 0,-5.957521438598633 C0.8278499841690063,-5.957521438598633 1.5,-5.28537130355835 1.5,-4.457521438598633z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278049230575562 0.8278865814208984,1.4999183416366577 0.00008165836334228516,1.4999183416366577 C0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 -0.00008165836334228516,1.4999183416366577 C-0.8278865814208984,1.4999183416366577 -1.5,0.8278049230575562 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278049230575562 -0.8278865814208984,-1.4999183416366577 -0.00008165836334228516,-1.4999183416366577 C-0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 0.00008165836334228516,-1.4999183416366577 C0.8278865814208984,-1.4999183416366577 1.5,-0.8278049230575562 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.9673030376434326 C1.5,-1.9673030376434326 1.5,1.9673030376434326 1.5,1.9673030376434326 C1.5,2.7951531410217285 0.8278499841690063,3.4673030376434326 0,3.4673030376434326 C0,3.4673030376434326 0,3.4673030376434326 0,3.4673030376434326 C-0.8278499841690063,3.4673030376434326 -1.5,2.7951531410217285 -1.5,1.9673030376434326 C-1.5,1.9673030376434326 -1.5,-1.9673030376434326 -1.5,-1.9673030376434326 C-1.5,-2.7951531410217285 -0.8278499841690063,-3.4673030376434326 0,-3.4673030376434326 C0,-3.4673030376434326 0,-3.4673030376434326 0,-3.4673030376434326 C0.8278499841690063,-3.4673030376434326 1.5,-2.7951531410217285 1.5,-1.9673030376434326z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6653488874435425 0.9597883224487305,1.205560564994812 0.294439435005188,1.205560564994812 C0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 -0.294439435005188,1.205560564994812 C-0.9597883224487305,1.205560564994812 -1.5,0.6653488874435425 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6653488874435425 -0.9597883224487305,-1.205560564994812 -0.294439435005188,-1.205560564994812 C-0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 0.294439435005188,-1.205560564994812 C0.9597883224487305,-1.205560564994812 1.5,-0.6653488874435425 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.8524916172027588 C1.5,-1.8524916172027588 1.5,1.8524916172027588 1.5,1.8524916172027588 C1.5,2.6803417205810547 0.8278499841690063,3.352491617202759 0,3.352491617202759 C0,3.352491617202759 0,3.352491617202759 0,3.352491617202759 C-0.8278499841690063,3.352491617202759 -1.5,2.6803417205810547 -1.5,1.8524916172027588 C-1.5,1.8524916172027588 -1.5,-1.8524916172027588 -1.5,-1.8524916172027588 C-1.5,-2.6803417205810547 -0.8278499841690063,-3.352491617202759 0,-3.352491617202759 C0,-3.352491617202759 0,-3.352491617202759 0,-3.352491617202759 C0.8278499841690063,-3.352491617202759 1.5,-2.6803417205810547 1.5,-1.8524916172027588z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8395519256591797 C1.5,-0.8395519256591797 1.5,0.8395519256591797 1.5,0.8395519256591797 C1.5,1.667401909828186 0.8278499841690063,2.3395519256591797 0,2.3395519256591797 C0,2.3395519256591797 0,2.3395519256591797 0,2.3395519256591797 C-0.8278499841690063,2.3395519256591797 -1.5,1.667401909828186 -1.5,0.8395519256591797 C-1.5,0.8395519256591797 -1.5,-0.8395519256591797 -1.5,-0.8395519256591797 C-1.5,-1.667401909828186 -0.8278499841690063,-2.3395519256591797 0,-2.3395519256591797 C0,-2.3395519256591797 0,-2.3395519256591797 0,-2.3395519256591797 C0.8278499841690063,-2.3395519256591797 1.5,-1.667401909828186 1.5,-0.8395519256591797z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.8278499841690063 0.8278499841690063,1.5 0,1.5 C0,1.5 0,1.5 0,1.5 C-0.8278499841690063,1.5 -1.5,0.8278499841690063 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.8278499841690063 -0.8278499841690063,-1.5 0,-1.5 C0,-1.5 0,-1.5 0,-1.5 C0.8278499841690063,-1.5 1.5,-0.8278499841690063 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.1890779733657837 C1.5,-0.1890779733657837 1.5,0.1890779733657837 1.5,0.1890779733657837 C1.5,1.01692795753479 0.8278499841690063,1.6890779733657837 0,1.6890779733657837 C0,1.6890779733657837 0,1.6890779733657837 0,1.6890779733657837 C-0.8278499841690063,1.6890779733657837 -1.5,1.01692795753479 -1.5,0.1890779733657837 C-1.5,0.1890779733657837 -1.5,-0.1890779733657837 -1.5,-0.1890779733657837 C-1.5,-1.01692795753479 -0.8278499841690063,-1.6890779733657837 0,-1.6890779733657837 C0,-1.6890779733657837 0,-1.6890779733657837 0,-1.6890779733657837 C0.8278499841690063,-1.6890779733657837 1.5,-1.01692795753479 1.5,-0.1890779733657837z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1890779733657837 C1.5,-0.1890779733657837 1.5,0.1890779733657837 1.5,0.1890779733657837 C1.5,1.01692795753479 0.8278499841690063,1.6890779733657837 0,1.6890779733657837 C0,1.6890779733657837 0,1.6890779733657837 0,1.6890779733657837 C-0.8278499841690063,1.6890779733657837 -1.5,1.01692795753479 -1.5,0.1890779733657837 C-1.5,0.1890779733657837 -1.5,-0.1890779733657837 -1.5,-0.1890779733657837 C-1.5,-1.01692795753479 -0.8278499841690063,-1.6890779733657837 0,-1.6890779733657837 C0,-1.6890779733657837 0,-1.6890779733657837 0,-1.6890779733657837 C0.8278499841690063,-1.6890779733657837 1.5,-1.01692795753479 1.5,-0.1890779733657837z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.34198057651519775 C1.5,-0.34198057651519775 1.5,0.34198057651519775 1.5,0.34198057651519775 C1.5,1.169830560684204 0.8278499841690063,1.8419805765151978 0,1.8419805765151978 C0,1.8419805765151978 0,1.8419805765151978 0,1.8419805765151978 C-0.8278499841690063,1.8419805765151978 -1.5,1.169830560684204 -1.5,0.34198057651519775 C-1.5,0.34198057651519775 -1.5,-0.34198057651519775 -1.5,-0.34198057651519775 C-1.5,-1.169830560684204 -0.8278499841690063,-1.8419805765151978 0,-1.8419805765151978 C0,-1.8419805765151978 0,-1.8419805765151978 0,-1.8419805765151978 C0.8278499841690063,-1.8419805765151978 1.5,-1.169830560684204 1.5,-0.34198057651519775z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <span>Create account</span>
                                                </button>
                                                <p class="mt-7 leading-[18px]">
                                                    <span class="mr-2">Already a member?</span>
                                                    <button type="button" class="btn_sign_in inline-flex items-center font-medium text-[#101010] hover:underline dark:text-white">
                                                        Sign in
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-1">
                                                            <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                                                            <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </p>
                                            </div>
                                        </form>
                                        <!------------------------------------------->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----> <!----> <!----> <!---->
                <!--form start Selling-->
                <!----> <!----> <!----> <!---->
                <div id="div_modal_sing_in_seller" class="hidden fixed inset-0 z-60 h-full w-full overflow-x-hidden bg-black bg-opacity-80 dark:bg-[#2c2c2c] dark:bg-opacity-70 auth-modal font-circular-std overflow-y-auto">
                    <div class="animated modal-popup-container absolute inset-0 h-full w-full text-center px-0 sm:px-3 slideInUp">
                        <div class="inline-block w-full text-left align-middle">
                            <div class="relative mx-auto max-w-full rounded-2xl bg-white px-7 pt-7 pb-9 text-black shadow-lg dark:bg-121212 dark:text-white my-0 sm:my-8 rounded-lg overflow-hidden !p-0" style="width: 936px;">
                                <!---->
                                <div id="modal_sing_in_seller" class="md:grid md:grid-cols-2">
                                    <div class="relative bg-black hidden md:block">
                                        <div class="absolute inset-x-0 top-0 h-1/2 w-full bg-cover" style="background-position: center top; background-image: url(&quot;<?=Yii::$app->request->baseUrl?>/img/auth-bg.fd59959.png&quot;);">
                                            <div class="absolute inset-0" style="background: linear-gradient(rgba(0, 0, 0, 0) 0%, rgb(0, 0, 0) 100%);"></div>
                                        </div>
                                        <div class="absolute inset-x-0 bottom-[53px] px-8 text-center font-circular-std text-white">
                                            <!----> <!---->
                                            <h3 class="text-[32px] font-medium leading-9">Start selling</h3>
                                            <div class="mx-auto mt-2 text-[15px] max-w-xs">Upload your samples for free and get paid. Cash out your earnings — daily.</div>
                                            <div class="mt-7 grid grid-cols-3 gap-4">
                                                <div class="flex h-[120px] flex-col items-center justify-center rounded-xl bg-white bg-opacity-[0.16] px-4">
                                         <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99.99 93.75" class="w-6 text-white">
                                               <path d="M8.6,10.61H22.66A2.34,2.34,0,0,1,25,13V53.27a1.09,1.09,0,0,0,1.09,1.09h4.75a.41.41,0,0,1,.41.41V89.51a2.35,2.35,0,0,1-2.35,2.35H8.6a2.35,2.35,0,0,1-2.35-2.35V13A2.35,2.35,0,0,1,8.6,10.61ZM38.42,54.36H42.5a1.25,1.25,0,0,0,1.25-1.26V13a2.34,2.34,0,0,1,2.34-2.34H53.9A2.35,2.35,0,0,1,56.25,13V53.47a.89.89,0,0,0,.89.89h4.5a.86.86,0,0,1,.86.85v34.3a2.35,2.35,0,0,1-2.35,2.35H39.84a2.35,2.35,0,0,1-2.34-2.35V55.28A.92.92,0,0,1,38.42,54.36Zm31.22,0h4.43a.93.93,0,0,0,.93-.93V13a2.34,2.34,0,0,1,2.34-2.34H91.4A2.35,2.35,0,0,1,93.75,13V89.51a2.35,2.35,0,0,1-2.35,2.35H71.09a2.35,2.35,0,0,1-2.34-2.35V55.25A.89.89,0,0,1,69.64,54.36ZM75,4.36H5.47A5.48,5.48,0,0,0,0,9.82V92.64a5.49,5.49,0,0,0,5.47,5.47H94.53A5.49,5.49,0,0,0,100,92.64V9.82a5.48,5.48,0,0,0-5.47-5.46Z" transform="translate(0 -4.36)" fill="currentColor"></path>
                                            </svg>
                                         </span>
                                                    <p class="mt-3 text-xs">Sell WAV, MIDI and stem files</p>
                                                </div>
                                                <div class="flex h-[120px] flex-col items-center justify-center rounded-xl bg-white bg-opacity-[0.16] px-4">
                                         <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path d="M11.9999 1V23" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                               <path d="M16.9999 5H9.49994C8.57168 5 7.68144 5.36875 7.02507 6.02513C6.36869 6.6815 5.99994 7.57174 5.99994 8.5C5.99994 9.42826 6.36869 10.3185 7.02507 10.9749C7.68144 11.6313 8.57168 12 9.49994 12H14.4999C15.4282 12 16.3184 12.3687 16.9748 13.0251C17.6312 13.6815 17.9999 14.5717 17.9999 15.5C17.9999 16.4283 17.6312 17.3185 16.9748 17.9749C16.3184 18.6313 15.4282 19 14.4999 19H5.99994" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                         </span>
                                                    <p class="mt-3 text-xs">Retain royalties on placements</p>
                                                </div>
                                                <div class="flex h-[120px] flex-col items-center justify-center rounded-xl bg-white bg-opacity-[0.16] px-4">
                                         <span>
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <path d="M5.69268 14H3.66666C3.11437 14 2.66666 14.4477 2.66666 15V20C2.66666 20.5523 3.11437 21 3.66666 21H5.69268C6.24497 21 6.69268 20.5523 6.69268 20V15C6.69268 14.4477 6.24497 14 5.69268 14Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                               <path d="M13.6797 8H11.6537C11.1014 8 10.6537 8.44772 10.6537 9V19.9134C10.6537 20.4657 11.1014 20.9134 11.6537 20.9134H13.6797C14.232 20.9134 14.6797 20.4657 14.6797 19.9134V9C14.6797 8.44772 14.232 8 13.6797 8Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                               <path d="M21.6667 3H19.6406C19.0883 3 18.6406 3.44772 18.6406 4V20.3328C18.6406 20.8851 19.0883 21.3328 19.6406 21.3328H21.6667C22.2189 21.3328 22.6667 20.8851 22.6667 20.3328V4C22.6667 3.44772 22.2189 3 21.6667 3Z" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                         </span>
                                                    <p class="mt-3 text-xs">See daily stats and analytics</p>
                                                </div>
                                                <!---->
                                            </div>
                                            <!----> <!---->
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex px-5 text-black">
                                            <div class="grow pr-4">
                                                <div class="mt-12 mb-2 hidden dark:text-white md:block">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 113 35" class="mx-auto w-[78px]">
                                                        <defs>
                                                            <clipPath id="maqra">
                                                                <path d="M.01.63h61.345v33.875H.01z"></path>
                                                            </clipPath>
                                                        </defs>
                                                        <g>
                                                            <g>
                                                                <g>
                                                                    <path fill="currentColor" d="M112.582 10.623C113.304 4.04 107.97.1 100.33.1a20.45 20.45 0 0 0-3.992.383l-8.138 15.586c3.634 4.918 12.562 5.095 12.562 8.968 0 1.586-1.297 2.403-3.073 2.403-2.31 0-3.365-1.297-3.173-3.46h-9.947c-.818 7.303 4.854 10.86 12.924 10.86 8.412 0 13.455-4.565 13.455-10.62 0-9.849-14.029-9.656-14.029-14.271 0-1.537 1.202-2.45 2.883-2.45 1.922 0 2.979 1.2 2.644 3.124h10.137"></path>
                                                                </g>
                                                                <g>
                                                                    <path fill="currentColor" d="M58.09.63h10.04l3.366 24.41L83.461.63h10.043L75.82 34.505H63.808L58.09.63"></path>
                                                                </g>
                                                                <g>
                                                                    <g></g>
                                                                    <g clip-path="url(#maqra)">
                                                                        <path fill="currentColor" d="M55.679.63h-1.618L48.48 11.187l1.626 10.633h-7.215l-3.761 7.153.067.006h12.015l.862 5.526h9.278L55.679.63"></path>
                                                                    </g>
                                                                    <g clip-path="url(#maqra)">
                                                                        <path fill="currentColor" d="M0 .63h10.186l-.096 23.16L19.458.63H29.79l1.042 21.74L41.686.63h9.75L33.532 34.505H23.257L22.246 13.7 13.79 34.505H2.209L0 .63"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="md:hidden">
                                                    <h3 class="mt-8 text-[28px] font-medium leading-8 dark:text-white">Start selling</h3>
                                                    <p class="mt-3 text-[#7E8084]">Unlock full access. Cancel anytime.</p>
                                                </div>
                                            </div>
                                            <div class="mt-10 w-6 shrink-0 md:hidden">
                                                <button type="button" class="text-[#868686] hover:text-black">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.99996 10.9092L15.0908 17C15.618 17.5272 16.4728 17.5272 17 17C17.5272 16.4728 17.5272 15.618 17 15.0908L10.9092 8.99999L17 2.90918C17.5272 2.38197 17.5272 1.5272 17 0.999991C16.4728 0.472783 15.618 0.472783 15.0908 0.999991L8.99996 7.09081L2.90915 0.999989C2.38194 0.472781 1.52717 0.472783 0.999958 0.99999C0.472752 1.5272 0.472752 2.38197 0.999958 2.90918L7.09077 8.99999L0.999971 15.0908C0.472763 15.618 0.472763 16.4728 0.999971 17C1.52718 17.5272 2.38195 17.5272 2.90916 17L8.99996 10.9092Z" fill="currentColor"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <form class="form_create_account space-y-4 px-5 py-6 pb-10 sm:px-8 text-[#7E8084]">
                                            <div>
                                                <div data-v-f669de34="">
                                                    <!---->
                                                    <!--<button data-v-f669de34="" type="button" class="btn-auth btn-auth-facebook hidden overflow-hidden lg:flex">
                                            <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                            <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                            <span data-v-f669de34="" class="w-[50px] shrink-0">

                                            </span>
                                         </button>
                                         <a data-v-f669de34="" href="https://api.vintapes.com/login/provider/facebook" class="btn-auth btn-auth-facebook flex overflow-hidden lg:hidden">
                                            <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                            <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                            <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                         </a>-->
                                                    <a href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" data-v-f669de34="" type="button" class="btn-auth btn-auth-google mt-4 hidden overflow-hidden lg:flex">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                    <a data-v-f669de34="" href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" class="btn-auth btn-auth-google mt-4 flex overflow-hidden lg:hidden">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                </div>
                                                <div class="my-8 flex items-center text-[#7F828A]"><span class="h-px w-full grow bg-[#ddd]"></span> <span class="whitespace-nowrap px-4">or create account using email</span> <span class="h-px w-full grow bg-[#ddd]"></span></div>
                                            </div>
                                            <div class="flex space-x-4">
                                                <div class="w-1/2">
                                                    <div data-v-06f78498="" class="floatlabel">
                                                        <input data-v-06f78498="" placeholder=" " type="text"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">First name</span></label> <!---->
                                                    </div>
                                                </div>
                                                <div class="w-1/2">
                                                    <div data-v-06f78498="" class="floatlabel">
                                                        <input data-v-06f78498="" placeholder=" " type="text"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Last name</span></label> <!---->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="text"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Email address</span></label> <!---->
                                                </div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="password"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Password</span></label> <!---->
                                                </div>
                                                <p class="mt-1 ml-4 text-xs font-medium text-[#7F828A]">8+ characters, at least 1 symbol</p>
                                            </div>
                                            <div class="!mt-6 flex items-center">
                                                <div value="" class="shrink-0 font-medium text-[#101010] dark:text-white">
                                                    <div class="toggle-new flex w-full items-center">
                                                        <label class="flex cursor-pointer items-center">
                                                            <div class="relative">
                                                                <input type="checkbox" class="sr-only" name="termsofuse">
                                                                <div class="line block h-7 w-12 rounded-full border-2 border-[#0A0A0A] bg-white transition duration-500"></div>
                                                                <div class="dot absolute left-[5px] top-[5px] h-[18px] w-4.5 rounded-full bg-[#515258] transition duration-500"></div>
                                                            </div>
                                                        </label>
                                                        <div class="ml-3">
                                                            I agree to the <!--<a target="_blank" href="<?=Url::to(['page/terms'])?>" class="underline hover:no-underline">Terms</a> &amp;-->
                                                            <a target="_blank" href="<?=Url::to(['page/privacy'])?>" class="underline hover:no-underline">Pivacy Policy</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="!mt-5 text-center">
                                                <button type="submit" class="btn btn-auth w-full rounded-[5px] py-2.5 text-[17px] leading-[26px]">
                                                    <div style="display: none;">
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent; display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_3">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_3)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-20.907350540161133 C1.5,-20.907350540161133 1.5,20.907350540161133 1.5,20.907350540161133 C1.5,21.735200881958008 0.8278499841690063,22.407350540161133 0,22.407350540161133 C0,22.407350540161133 0,22.407350540161133 0,22.407350540161133 C-0.8278499841690063,22.407350540161133 -1.5,21.735200881958008 -1.5,20.907350540161133 C-1.5,20.907350540161133 -1.5,-20.907350540161133 -1.5,-20.907350540161133 C-1.5,-21.735200881958008 -0.8278499841690063,-22.407350540161133 0,-22.407350540161133 C0,-22.407350540161133 0,-22.407350540161133 0,-22.407350540161133 C0.8278499841690063,-22.407350540161133 1.5,-21.735200881958008 1.5,-20.907350540161133z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-20.907350540161133 C1.5,-20.907350540161133 1.5,20.907350540161133 1.5,20.907350540161133 C1.5,21.735200881958008 0.8278499841690063,22.407350540161133 0,22.407350540161133 C0,22.407350540161133 0,22.407350540161133 0,22.407350540161133 C-0.8278499841690063,22.407350540161133 -1.5,21.735200881958008 -1.5,20.907350540161133 C-1.5,20.907350540161133 -1.5,-20.907350540161133 -1.5,-20.907350540161133 C-1.5,-21.735200881958008 -0.8278499841690063,-22.407350540161133 0,-22.407350540161133 C0,-22.407350540161133 0,-22.407350540161133 0,-22.407350540161133 C0.8278499841690063,-22.407350540161133 1.5,-21.735200881958008 1.5,-20.907350540161133z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-7.735749244689941 C1.5,-7.735749244689941 1.5,7.735749244689941 1.5,7.735749244689941 C1.5,8.563599586486816 0.8278499841690063,9.235749244689941 0,9.235749244689941 C0,9.235749244689941 0,9.235749244689941 0,9.235749244689941 C-0.8278499841690063,9.235749244689941 -1.5,8.563599586486816 -1.5,7.735749244689941 C-1.5,7.735749244689941 -1.5,-7.735749244689941 -1.5,-7.735749244689941 C-1.5,-8.563599586486816 -0.8278499841690063,-9.235749244689941 0,-9.235749244689941 C0,-9.235749244689941 0,-9.235749244689941 0,-9.235749244689941 C0.8278499841690063,-9.235749244689941 1.5,-8.563599586486816 1.5,-7.735749244689941z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-7.735749244689941 C1.5,-7.735749244689941 1.5,7.735749244689941 1.5,7.735749244689941 C1.5,8.563599586486816 0.8278499841690063,9.235749244689941 0,9.235749244689941 C0,9.235749244689941 0,9.235749244689941 0,9.235749244689941 C-0.8278499841690063,9.235749244689941 -1.5,8.563599586486816 -1.5,7.735749244689941 C-1.5,7.735749244689941 -1.5,-7.735749244689941 -1.5,-7.735749244689941 C-1.5,-8.563599586486816 -0.8278499841690063,-9.235749244689941 0,-9.235749244689941 C0,-9.235749244689941 0,-9.235749244689941 0,-9.235749244689941 C0.8278499841690063,-9.235749244689941 1.5,-8.563599586486816 1.5,-7.735749244689941z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.30208849906921387 C1.5,-0.30208849906921387 1.5,0.30208849906921387 1.5,0.30208849906921387 C1.5,1.1299384832382202 0.8278499841690063,1.8020884990692139 0,1.8020884990692139 C0,1.8020884990692139 0,1.8020884990692139 0,1.8020884990692139 C-0.8278499841690063,1.8020884990692139 -1.5,1.1299384832382202 -1.5,0.30208849906921387 C-1.5,0.30208849906921387 -1.5,-0.30208849906921387 -1.5,-0.30208849906921387 C-1.5,-1.1299384832382202 -0.8278499841690063,-1.8020884990692139 0,-1.8020884990692139 C0,-1.8020884990692139 0,-1.8020884990692139 0,-1.8020884990692139 C0.8278499841690063,-1.8020884990692139 1.5,-1.1299384832382202 1.5,-0.30208849906921387z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.30208849906921387 C1.5,-0.30208849906921387 1.5,0.30208849906921387 1.5,0.30208849906921387 C1.5,1.1299384832382202 0.8278499841690063,1.8020884990692139 0,1.8020884990692139 C0,1.8020884990692139 0,1.8020884990692139 0,1.8020884990692139 C-0.8278499841690063,1.8020884990692139 -1.5,1.1299384832382202 -1.5,0.30208849906921387 C-1.5,0.30208849906921387 -1.5,-0.30208849906921387 -1.5,-0.30208849906921387 C-1.5,-1.1299384832382202 -0.8278499841690063,-1.8020884990692139 0,-1.8020884990692139 C0,-1.8020884990692139 0,-1.8020884990692139 0,-1.8020884990692139 C0.8278499841690063,-1.8020884990692139 1.5,-1.1299384832382202 1.5,-0.30208849906921387z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.496074676513672 C1.5,-4.496074676513672 1.5,4.496074676513672 1.5,4.496074676513672 C1.5,5.323924541473389 0.8278499841690063,5.996074676513672 0,5.996074676513672 C0,5.996074676513672 0,5.996074676513672 0,5.996074676513672 C-0.8278499841690063,5.996074676513672 -1.5,5.323924541473389 -1.5,4.496074676513672 C-1.5,4.496074676513672 -1.5,-4.496074676513672 -1.5,-4.496074676513672 C-1.5,-5.323924541473389 -0.8278499841690063,-5.996074676513672 0,-5.996074676513672 C0,-5.996074676513672 0,-5.996074676513672 0,-5.996074676513672 C0.8278499841690063,-5.996074676513672 1.5,-5.323924541473389 1.5,-4.496074676513672z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.496074676513672 C1.5,-4.496074676513672 1.5,4.496074676513672 1.5,4.496074676513672 C1.5,5.323924541473389 0.8278499841690063,5.996074676513672 0,5.996074676513672 C0,5.996074676513672 0,5.996074676513672 0,5.996074676513672 C-0.8278499841690063,5.996074676513672 -1.5,5.323924541473389 -1.5,4.496074676513672 C-1.5,4.496074676513672 -1.5,-4.496074676513672 -1.5,-4.496074676513672 C-1.5,-5.323924541473389 -0.8278499841690063,-5.996074676513672 0,-5.996074676513672 C0,-5.996074676513672 0,-5.996074676513672 0,-5.996074676513672 C0.8278499841690063,-5.996074676513672 1.5,-5.323924541473389 1.5,-4.496074676513672z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.605095863342285 C1.5,-3.605095863342285 1.5,3.605095863342285 1.5,3.605095863342285 C1.5,4.432945728302002 0.8278499841690063,5.105095863342285 0,5.105095863342285 C0,5.105095863342285 0,5.105095863342285 0,5.105095863342285 C-0.8278499841690063,5.105095863342285 -1.5,4.432945728302002 -1.5,3.605095863342285 C-1.5,3.605095863342285 -1.5,-3.605095863342285 -1.5,-3.605095863342285 C-1.5,-4.432945728302002 -0.8278499841690063,-5.105095863342285 0,-5.105095863342285 C0,-5.105095863342285 0,-5.105095863342285 0,-5.105095863342285 C0.8278499841690063,-5.105095863342285 1.5,-4.432945728302002 1.5,-3.605095863342285z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.605095863342285 C1.5,-3.605095863342285 1.5,3.605095863342285 1.5,3.605095863342285 C1.5,4.432945728302002 0.8278499841690063,5.105095863342285 0,5.105095863342285 C0,5.105095863342285 0,5.105095863342285 0,5.105095863342285 C-0.8278499841690063,5.105095863342285 -1.5,4.432945728302002 -1.5,3.605095863342285 C-1.5,3.605095863342285 -1.5,-3.605095863342285 -1.5,-3.605095863342285 C-1.5,-4.432945728302002 -0.8278499841690063,-5.105095863342285 0,-5.105095863342285 C0,-5.105095863342285 0,-5.105095863342285 0,-5.105095863342285 C0.8278499841690063,-5.105095863342285 1.5,-4.432945728302002 1.5,-3.605095863342285z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.47903895378112793 C1.5,-0.47903895378112793 1.5,0.47903895378112793 1.5,0.47903895378112793 C1.5,1.3068889379501343 0.8278499841690063,1.979038953781128 0,1.979038953781128 C0,1.979038953781128 0,1.979038953781128 0,1.979038953781128 C-0.8278499841690063,1.979038953781128 -1.5,1.3068889379501343 -1.5,0.47903895378112793 C-1.5,0.47903895378112793 -1.5,-0.47903895378112793 -1.5,-0.47903895378112793 C-1.5,-1.3068889379501343 -0.8278499841690063,-1.979038953781128 0,-1.979038953781128 C0,-1.979038953781128 0,-1.979038953781128 0,-1.979038953781128 C0.8278499841690063,-1.979038953781128 1.5,-1.3068889379501343 1.5,-0.47903895378112793z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.47903895378112793 C1.5,-0.47903895378112793 1.5,0.47903895378112793 1.5,0.47903895378112793 C1.5,1.3068889379501343 0.8278499841690063,1.979038953781128 0,1.979038953781128 C0,1.979038953781128 0,1.979038953781128 0,1.979038953781128 C-0.8278499841690063,1.979038953781128 -1.5,1.3068889379501343 -1.5,0.47903895378112793 C-1.5,0.47903895378112793 -1.5,-0.47903895378112793 -1.5,-0.47903895378112793 C-1.5,-1.3068889379501343 -0.8278499841690063,-1.979038953781128 0,-1.979038953781128 C0,-1.979038953781128 0,-1.979038953781128 0,-1.979038953781128 C0.8278499841690063,-1.979038953781128 1.5,-1.3068889379501343 1.5,-0.47903895378112793z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7643070220947266 C1.5,-0.7643070220947266 1.5,0.7643070220947266 1.5,0.7643070220947266 C1.5,1.592157006263733 0.8278499841690063,2.2643070220947266 0,2.2643070220947266 C0,2.2643070220947266 0,2.2643070220947266 0,2.2643070220947266 C-0.8278499841690063,2.2643070220947266 -1.5,1.592157006263733 -1.5,0.7643070220947266 C-1.5,0.7643070220947266 -1.5,-0.7643070220947266 -1.5,-0.7643070220947266 C-1.5,-1.592157006263733 -0.8278499841690063,-2.2643070220947266 0,-2.2643070220947266 C0,-2.2643070220947266 0,-2.2643070220947266 0,-2.2643070220947266 C0.8278499841690063,-2.2643070220947266 1.5,-1.592157006263733 1.5,-0.7643070220947266z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7643070220947266 C1.5,-0.7643070220947266 1.5,0.7643070220947266 1.5,0.7643070220947266 C1.5,1.592157006263733 0.8278499841690063,2.2643070220947266 0,2.2643070220947266 C0,2.2643070220947266 0,2.2643070220947266 0,2.2643070220947266 C-0.8278499841690063,2.2643070220947266 -1.5,1.592157006263733 -1.5,0.7643070220947266 C-1.5,0.7643070220947266 -1.5,-0.7643070220947266 -1.5,-0.7643070220947266 C-1.5,-1.592157006263733 -0.8278499841690063,-2.2643070220947266 0,-2.2643070220947266 C0,-2.2643070220947266 0,-2.2643070220947266 0,-2.2643070220947266 C0.8278499841690063,-2.2643070220947266 1.5,-1.592157006263733 1.5,-0.7643070220947266z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_139">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_139)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-20.907350540161133 C1.5,-20.907350540161133 1.5,20.907350540161133 1.5,20.907350540161133 C1.5,21.735200881958008 0.8278499841690063,22.407350540161133 0,22.407350540161133 C0,22.407350540161133 0,22.407350540161133 0,22.407350540161133 C-0.8278499841690063,22.407350540161133 -1.5,21.735200881958008 -1.5,20.907350540161133 C-1.5,20.907350540161133 -1.5,-20.907350540161133 -1.5,-20.907350540161133 C-1.5,-21.735200881958008 -0.8278499841690063,-22.407350540161133 0,-22.407350540161133 C0,-22.407350540161133 0,-22.407350540161133 0,-22.407350540161133 C0.8278499841690063,-22.407350540161133 1.5,-21.735200881958008 1.5,-20.907350540161133z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-20.907350540161133 C1.5,-20.907350540161133 1.5,20.907350540161133 1.5,20.907350540161133 C1.5,21.735200881958008 0.8278499841690063,22.407350540161133 0,22.407350540161133 C0,22.407350540161133 0,22.407350540161133 0,22.407350540161133 C-0.8278499841690063,22.407350540161133 -1.5,21.735200881958008 -1.5,20.907350540161133 C-1.5,20.907350540161133 -1.5,-20.907350540161133 -1.5,-20.907350540161133 C-1.5,-21.735200881958008 -0.8278499841690063,-22.407350540161133 0,-22.407350540161133 C0,-22.407350540161133 0,-22.407350540161133 0,-22.407350540161133 C0.8278499841690063,-22.407350540161133 1.5,-21.735200881958008 1.5,-20.907350540161133z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-7.735749244689941 C1.5,-7.735749244689941 1.5,7.735749244689941 1.5,7.735749244689941 C1.5,8.563599586486816 0.8278499841690063,9.235749244689941 0,9.235749244689941 C0,9.235749244689941 0,9.235749244689941 0,9.235749244689941 C-0.8278499841690063,9.235749244689941 -1.5,8.563599586486816 -1.5,7.735749244689941 C-1.5,7.735749244689941 -1.5,-7.735749244689941 -1.5,-7.735749244689941 C-1.5,-8.563599586486816 -0.8278499841690063,-9.235749244689941 0,-9.235749244689941 C0,-9.235749244689941 0,-9.235749244689941 0,-9.235749244689941 C0.8278499841690063,-9.235749244689941 1.5,-8.563599586486816 1.5,-7.735749244689941z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-7.735749244689941 C1.5,-7.735749244689941 1.5,7.735749244689941 1.5,7.735749244689941 C1.5,8.563599586486816 0.8278499841690063,9.235749244689941 0,9.235749244689941 C0,9.235749244689941 0,9.235749244689941 0,9.235749244689941 C-0.8278499841690063,9.235749244689941 -1.5,8.563599586486816 -1.5,7.735749244689941 C-1.5,7.735749244689941 -1.5,-7.735749244689941 -1.5,-7.735749244689941 C-1.5,-8.563599586486816 -0.8278499841690063,-9.235749244689941 0,-9.235749244689941 C0,-9.235749244689941 0,-9.235749244689941 0,-9.235749244689941 C0.8278499841690063,-9.235749244689941 1.5,-8.563599586486816 1.5,-7.735749244689941z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-8.85918140411377 C1.5,-8.85918140411377 1.5,8.85918140411377 1.5,8.85918140411377 C1.5,9.687031745910645 0.8278499841690063,10.35918140411377 0,10.35918140411377 C0,10.35918140411377 0,10.35918140411377 0,10.35918140411377 C-0.8278499841690063,10.35918140411377 -1.5,9.687031745910645 -1.5,8.85918140411377 C-1.5,8.85918140411377 -1.5,-8.85918140411377 -1.5,-8.85918140411377 C-1.5,-9.687031745910645 -0.8278499841690063,-10.35918140411377 0,-10.35918140411377 C0,-10.35918140411377 0,-10.35918140411377 0,-10.35918140411377 C0.8278499841690063,-10.35918140411377 1.5,-9.687031745910645 1.5,-8.85918140411377z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.4042789936065674 C1.5,-2.4042789936065674 1.5,2.4042789936065674 1.5,2.4042789936065674 C1.5,3.2321290969848633 0.8278499841690063,3.9042789936065674 0,3.9042789936065674 C0,3.9042789936065674 0,3.9042789936065674 0,3.9042789936065674 C-0.8278499841690063,3.9042789936065674 -1.5,3.2321290969848633 -1.5,2.4042789936065674 C-1.5,2.4042789936065674 -1.5,-2.4042789936065674 -1.5,-2.4042789936065674 C-1.5,-3.2321290969848633 -0.8278499841690063,-3.9042789936065674 0,-3.9042789936065674 C0,-3.9042789936065674 0,-3.9042789936065674 0,-3.9042789936065674 C0.8278499841690063,-3.9042789936065674 1.5,-3.2321290969848633 1.5,-2.4042789936065674z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.30208849906921387 C1.5,-0.30208849906921387 1.5,0.30208849906921387 1.5,0.30208849906921387 C1.5,1.1299384832382202 0.8278499841690063,1.8020884990692139 0,1.8020884990692139 C0,1.8020884990692139 0,1.8020884990692139 0,1.8020884990692139 C-0.8278499841690063,1.8020884990692139 -1.5,1.1299384832382202 -1.5,0.30208849906921387 C-1.5,0.30208849906921387 -1.5,-0.30208849906921387 -1.5,-0.30208849906921387 C-1.5,-1.1299384832382202 -0.8278499841690063,-1.8020884990692139 0,-1.8020884990692139 C0,-1.8020884990692139 0,-1.8020884990692139 0,-1.8020884990692139 C0.8278499841690063,-1.8020884990692139 1.5,-1.1299384832382202 1.5,-0.30208849906921387z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.30208849906921387 C1.5,-0.30208849906921387 1.5,0.30208849906921387 1.5,0.30208849906921387 C1.5,1.1299384832382202 0.8278499841690063,1.8020884990692139 0,1.8020884990692139 C0,1.8020884990692139 0,1.8020884990692139 0,1.8020884990692139 C-0.8278499841690063,1.8020884990692139 -1.5,1.1299384832382202 -1.5,0.30208849906921387 C-1.5,0.30208849906921387 -1.5,-0.30208849906921387 -1.5,-0.30208849906921387 C-1.5,-1.1299384832382202 -0.8278499841690063,-1.8020884990692139 0,-1.8020884990692139 C0,-1.8020884990692139 0,-1.8020884990692139 0,-1.8020884990692139 C0.8278499841690063,-1.8020884990692139 1.5,-1.1299384832382202 1.5,-0.30208849906921387z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.496074676513672 C1.5,-4.496074676513672 1.5,4.496074676513672 1.5,4.496074676513672 C1.5,5.323924541473389 0.8278499841690063,5.996074676513672 0,5.996074676513672 C0,5.996074676513672 0,5.996074676513672 0,5.996074676513672 C-0.8278499841690063,5.996074676513672 -1.5,5.323924541473389 -1.5,4.496074676513672 C-1.5,4.496074676513672 -1.5,-4.496074676513672 -1.5,-4.496074676513672 C-1.5,-5.323924541473389 -0.8278499841690063,-5.996074676513672 0,-5.996074676513672 C0,-5.996074676513672 0,-5.996074676513672 0,-5.996074676513672 C0.8278499841690063,-5.996074676513672 1.5,-5.323924541473389 1.5,-4.496074676513672z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.496074676513672 C1.5,-4.496074676513672 1.5,4.496074676513672 1.5,4.496074676513672 C1.5,5.323924541473389 0.8278499841690063,5.996074676513672 0,5.996074676513672 C0,5.996074676513672 0,5.996074676513672 0,5.996074676513672 C-0.8278499841690063,5.996074676513672 -1.5,5.323924541473389 -1.5,4.496074676513672 C-1.5,4.496074676513672 -1.5,-4.496074676513672 -1.5,-4.496074676513672 C-1.5,-5.323924541473389 -0.8278499841690063,-5.996074676513672 0,-5.996074676513672 C0,-5.996074676513672 0,-5.996074676513672 0,-5.996074676513672 C0.8278499841690063,-5.996074676513672 1.5,-5.323924541473389 1.5,-4.496074676513672z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.605095863342285 C1.5,-3.605095863342285 1.5,3.605095863342285 1.5,3.605095863342285 C1.5,4.432945728302002 0.8278499841690063,5.105095863342285 0,5.105095863342285 C0,5.105095863342285 0,5.105095863342285 0,5.105095863342285 C-0.8278499841690063,5.105095863342285 -1.5,4.432945728302002 -1.5,3.605095863342285 C-1.5,3.605095863342285 -1.5,-3.605095863342285 -1.5,-3.605095863342285 C-1.5,-4.432945728302002 -0.8278499841690063,-5.105095863342285 0,-5.105095863342285 C0,-5.105095863342285 0,-5.105095863342285 0,-5.105095863342285 C0.8278499841690063,-5.105095863342285 1.5,-4.432945728302002 1.5,-3.605095863342285z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.605095863342285 C1.5,-3.605095863342285 1.5,3.605095863342285 1.5,3.605095863342285 C1.5,4.432945728302002 0.8278499841690063,5.105095863342285 0,5.105095863342285 C0,5.105095863342285 0,5.105095863342285 0,5.105095863342285 C-0.8278499841690063,5.105095863342285 -1.5,4.432945728302002 -1.5,3.605095863342285 C-1.5,3.605095863342285 -1.5,-3.605095863342285 -1.5,-3.605095863342285 C-1.5,-4.432945728302002 -0.8278499841690063,-5.105095863342285 0,-5.105095863342285 C0,-5.105095863342285 0,-5.105095863342285 0,-5.105095863342285 C0.8278499841690063,-5.105095863342285 1.5,-4.432945728302002 1.5,-3.605095863342285z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-5.75248908996582 C1.5,-5.75248908996582 1.5,5.75248908996582 1.5,5.75248908996582 C1.5,6.580338954925537 0.8278499841690063,7.25248908996582 0,7.25248908996582 C0,7.25248908996582 0,7.25248908996582 0,7.25248908996582 C-0.8278499841690063,7.25248908996582 -1.5,6.580338954925537 -1.5,5.75248908996582 C-1.5,5.75248908996582 -1.5,-5.75248908996582 -1.5,-5.75248908996582 C-1.5,-6.580338954925537 -0.8278499841690063,-7.25248908996582 0,-7.25248908996582 C0,-7.25248908996582 0,-7.25248908996582 0,-7.25248908996582 C0.8278499841690063,-7.25248908996582 1.5,-6.580338954925537 1.5,-5.75248908996582z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.317512035369873 C1.5,-3.317512035369873 1.5,3.317512035369873 1.5,3.317512035369873 C1.5,4.14536190032959 0.8278499841690063,4.817512035369873 0,4.817512035369873 C0,4.817512035369873 0,4.817512035369873 0,4.817512035369873 C-0.8278499841690063,4.817512035369873 -1.5,4.14536190032959 -1.5,3.317512035369873 C-1.5,3.317512035369873 -1.5,-3.317512035369873 -1.5,-3.317512035369873 C-1.5,-4.14536190032959 -0.8278499841690063,-4.817512035369873 0,-4.817512035369873 C0,-4.817512035369873 0,-4.817512035369873 0,-4.817512035369873 C0.8278499841690063,-4.817512035369873 1.5,-4.14536190032959 1.5,-3.317512035369873z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.0482466220855713 C1.5,-2.0482466220855713 1.5,2.0482466220855713 1.5,2.0482466220855713 C1.5,2.876096725463867 0.8278499841690063,3.5482466220855713 0,3.5482466220855713 C0,3.5482466220855713 0,3.5482466220855713 0,3.5482466220855713 C-0.8278499841690063,3.5482466220855713 -1.5,2.876096725463867 -1.5,2.0482466220855713 C-1.5,2.0482466220855713 -1.5,-2.0482466220855713 -1.5,-2.0482466220855713 C-1.5,-2.876096725463867 -0.8278499841690063,-3.5482466220855713 0,-3.5482466220855713 C0,-3.5482466220855713 0,-3.5482466220855713 0,-3.5482466220855713 C0.8278499841690063,-3.5482466220855713 1.5,-2.876096725463867 1.5,-2.0482466220855713z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5149755477905273 C1.5,-0.5149755477905273 1.5,0.5149755477905273 1.5,0.5149755477905273 C1.5,1.3428255319595337 0.8278499841690063,2.0149755477905273 0,2.0149755477905273 C0,2.0149755477905273 0,2.0149755477905273 0,2.0149755477905273 C-0.8278499841690063,2.0149755477905273 -1.5,1.3428255319595337 -1.5,0.5149755477905273 C-1.5,0.5149755477905273 -1.5,-0.5149755477905273 -1.5,-0.5149755477905273 C-1.5,-1.3428255319595337 -0.8278499841690063,-2.0149755477905273 0,-2.0149755477905273 C0,-2.0149755477905273 0,-2.0149755477905273 0,-2.0149755477905273 C0.8278499841690063,-2.0149755477905273 1.5,-1.3428255319595337 1.5,-0.5149755477905273z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7484645843505859 C1.5,-0.7484645843505859 1.5,0.7484645843505859 1.5,0.7484645843505859 C1.5,1.5763145685195923 0.8278499841690063,2.248464584350586 0,2.248464584350586 C0,2.248464584350586 0,2.248464584350586 0,2.248464584350586 C-0.8278499841690063,2.248464584350586 -1.5,1.5763145685195923 -1.5,0.7484645843505859 C-1.5,0.7484645843505859 -1.5,-0.7484645843505859 -1.5,-0.7484645843505859 C-1.5,-1.5763145685195923 -0.8278499841690063,-2.248464584350586 0,-2.248464584350586 C0,-2.248464584350586 0,-2.248464584350586 0,-2.248464584350586 C0.8278499841690063,-2.248464584350586 1.5,-1.5763145685195923 1.5,-0.7484645843505859z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.823582649230957 C1.5,-3.823582649230957 1.5,3.823582649230957 1.5,3.823582649230957 C1.5,4.651432514190674 0.8278499841690063,5.323582649230957 0,5.323582649230957 C0,5.323582649230957 0,5.323582649230957 0,5.323582649230957 C-0.8278499841690063,5.323582649230957 -1.5,4.651432514190674 -1.5,3.823582649230957 C-1.5,3.823582649230957 -1.5,-3.823582649230957 -1.5,-3.823582649230957 C-1.5,-4.651432514190674 -0.8278499841690063,-5.323582649230957 0,-5.323582649230957 C0,-5.323582649230957 0,-5.323582649230957 0,-5.323582649230957 C0.8278499841690063,-5.323582649230957 1.5,-4.651432514190674 1.5,-3.823582649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.1506195068359375 C1.5,-0.1506195068359375 1.5,0.1506195068359375 1.5,0.1506195068359375 C1.5,0.9784694910049438 0.8278499841690063,1.6506195068359375 0,1.6506195068359375 C0,1.6506195068359375 0,1.6506195068359375 0,1.6506195068359375 C-0.8278499841690063,1.6506195068359375 -1.5,0.9784694910049438 -1.5,0.1506195068359375 C-1.5,0.1506195068359375 -1.5,-0.1506195068359375 -1.5,-0.1506195068359375 C-1.5,-0.9784694910049438 -0.8278499841690063,-1.6506195068359375 0,-1.6506195068359375 C0,-1.6506195068359375 0,-1.6506195068359375 0,-1.6506195068359375 C0.8278499841690063,-1.6506195068359375 1.5,-0.9784694910049438 1.5,-0.1506195068359375z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.425611972808838 C1.5,-1.425611972808838 1.5,1.425611972808838 1.5,1.425611972808838 C1.5,2.253462076187134 0.8278499841690063,2.925611972808838 0,2.925611972808838 C0,2.925611972808838 0,2.925611972808838 0,2.925611972808838 C-0.8278499841690063,2.925611972808838 -1.5,2.253462076187134 -1.5,1.425611972808838 C-1.5,1.425611972808838 -1.5,-1.425611972808838 -1.5,-1.425611972808838 C-1.5,-2.253462076187134 -0.8278499841690063,-2.925611972808838 0,-2.925611972808838 C0,-2.925611972808838 0,-2.925611972808838 0,-2.925611972808838 C0.8278499841690063,-2.925611972808838 1.5,-2.253462076187134 1.5,-1.425611972808838z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.6801834106445312 0.9477437734603882,1.232439637184143 0.26756036281585693,1.232439637184143 C0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 -0.26756036281585693,1.232439637184143 C-0.9477437734603882,1.232439637184143 -1.5,0.6801834106445312 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.6801834106445312 -0.9477437734603882,-1.232439637184143 -0.26756036281585693,-1.232439637184143 C-0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 0.26756036281585693,-1.232439637184143 C0.9477437734603882,-1.232439637184143 1.5,-0.6801834106445312 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.47903895378112793 C1.5,-0.47903895378112793 1.5,0.47903895378112793 1.5,0.47903895378112793 C1.5,1.3068889379501343 0.8278499841690063,1.979038953781128 0,1.979038953781128 C0,1.979038953781128 0,1.979038953781128 0,1.979038953781128 C-0.8278499841690063,1.979038953781128 -1.5,1.3068889379501343 -1.5,0.47903895378112793 C-1.5,0.47903895378112793 -1.5,-0.47903895378112793 -1.5,-0.47903895378112793 C-1.5,-1.3068889379501343 -0.8278499841690063,-1.979038953781128 0,-1.979038953781128 C0,-1.979038953781128 0,-1.979038953781128 0,-1.979038953781128 C0.8278499841690063,-1.979038953781128 1.5,-1.3068889379501343 1.5,-0.47903895378112793z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.47903895378112793 C1.5,-0.47903895378112793 1.5,0.47903895378112793 1.5,0.47903895378112793 C1.5,1.3068889379501343 0.8278499841690063,1.979038953781128 0,1.979038953781128 C0,1.979038953781128 0,1.979038953781128 0,1.979038953781128 C-0.8278499841690063,1.979038953781128 -1.5,1.3068889379501343 -1.5,0.47903895378112793 C-1.5,0.47903895378112793 -1.5,-0.47903895378112793 -1.5,-0.47903895378112793 C-1.5,-1.3068889379501343 -0.8278499841690063,-1.979038953781128 0,-1.979038953781128 C0,-1.979038953781128 0,-1.979038953781128 0,-1.979038953781128 C0.8278499841690063,-1.979038953781128 1.5,-1.3068889379501343 1.5,-0.47903895378112793z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7643070220947266 C1.5,-0.7643070220947266 1.5,0.7643070220947266 1.5,0.7643070220947266 C1.5,1.592157006263733 0.8278499841690063,2.2643070220947266 0,2.2643070220947266 C0,2.2643070220947266 0,2.2643070220947266 0,2.2643070220947266 C-0.8278499841690063,2.2643070220947266 -1.5,1.592157006263733 -1.5,0.7643070220947266 C-1.5,0.7643070220947266 -1.5,-0.7643070220947266 -1.5,-0.7643070220947266 C-1.5,-1.592157006263733 -0.8278499841690063,-2.2643070220947266 0,-2.2643070220947266 C0,-2.2643070220947266 0,-2.2643070220947266 0,-2.2643070220947266 C0.8278499841690063,-2.2643070220947266 1.5,-1.592157006263733 1.5,-0.7643070220947266z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7643070220947266 C1.5,-0.7643070220947266 1.5,0.7643070220947266 1.5,0.7643070220947266 C1.5,1.592157006263733 0.8278499841690063,2.2643070220947266 0,2.2643070220947266 C0,2.2643070220947266 0,2.2643070220947266 0,2.2643070220947266 C-0.8278499841690063,2.2643070220947266 -1.5,1.592157006263733 -1.5,0.7643070220947266 C-1.5,0.7643070220947266 -1.5,-0.7643070220947266 -1.5,-0.7643070220947266 C-1.5,-1.592157006263733 -0.8278499841690063,-2.2643070220947266 0,-2.2643070220947266 C0,-2.2643070220947266 0,-2.2643070220947266 0,-2.2643070220947266 C0.8278499841690063,-2.2643070220947266 1.5,-1.592157006263733 1.5,-0.7643070220947266z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.9842634201049805 C1.5,-0.9842634201049805 1.5,0.9842634201049805 1.5,0.9842634201049805 C1.5,1.8121134042739868 0.8278499841690063,2.4842634201049805 0,2.4842634201049805 C0,2.4842634201049805 0,2.4842634201049805 0,2.4842634201049805 C-0.8278499841690063,2.4842634201049805 -1.5,1.8121134042739868 -1.5,0.9842634201049805 C-1.5,0.9842634201049805 -1.5,-0.9842634201049805 -1.5,-0.9842634201049805 C-1.5,-1.8121134042739868 -0.8278499841690063,-2.4842634201049805 0,-2.4842634201049805 C0,-2.4842634201049805 0,-2.4842634201049805 0,-2.4842634201049805 C0.8278499841690063,-2.4842634201049805 1.5,-1.8121134042739868 1.5,-0.9842634201049805z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <span>Create account</span>
                                                </button>
                                                <p class="mt-7 leading-[18px]">
                                                    <span class="mr-2">Already a member?</span>
                                                    <button type="button" class="btn_sign_in inline-flex items-center font-medium text-[#101010] hover:underline dark:text-white">
                                                        Sign in
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-1">
                                                            <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                                                            <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </p>
                                            </div>
                                        </form>
                                        <!--------->
                                        <form class="form_sign_in space-y-4 px-5 py-6 pb-10 sm:px-8 text-[#7E8084] hidden">
                                            <div>
                                                <div data-v-f669de34="">
                                                    <!---->
                                                    <!--<button data-v-f669de34="" type="button" class="btn-auth btn-auth-facebook hidden overflow-hidden lg:flex">
                                            <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                            <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                            <span data-v-f669de34="" class="w-[50px] shrink-0">

                                            </span>
                                         </button>
                                         <a data-v-f669de34="" href="https://api.vintapes.com/login/provider/facebook" class="btn-auth btn-auth-facebook flex overflow-hidden lg:hidden">
                                            <span data-v-f669de34="" class="w-[50px] text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjUiIHZpZXdCb3g9IjAgMCAyNCAyNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzM1NTRfMjk5KSI+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjQgMTIuNTcwN0MyNCA1LjkwNDI0IDE4LjYyNzQgMC41IDEyIDAuNUM1LjM3MjU4IDAuNSAwIDUuOTA0MjQgMCAxMi41NzA3QzAgMTguNTk1NiA0LjM4ODIzIDIzLjU4OTMgMTAuMTI1IDI0LjQ5NDhWMTYuMDU5OUg3LjA3ODEyVjEyLjU3MDdIMTAuMTI1VjkuOTExMzlDMTAuMTI1IDYuODg2MTcgMTEuOTE2NSA1LjIxNTEzIDE0LjY1NzYgNS4yMTUxM0MxNS45NzA1IDUuMjE1MTMgMTcuMzQzOCA1LjQ1MDg4IDE3LjM0MzggNS40NTA4OFY4LjQyMTQxSDE1LjgzMDZDMTQuMzM5OSA4LjQyMTQxIDEzLjg3NSA5LjM1MTg3IDEzLjg3NSAxMC4zMDY1VjEyLjU3MDdIMTcuMjAzMUwxNi42NzExIDE2LjA1OTlIMTMuODc1VjI0LjQ5NDhDMTkuNjExOCAyMy41ODkzIDI0IDE4LjU5NTYgMjQgMTIuNTcwN1oiIGZpbGw9IiNGRkZGRkUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF8zNTU0XzI5OSI+CjxyZWN0IHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgZmlsbD0id2hpdGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMC41KSIvPgo8L2NsaXBQYXRoPgo8L2RlZnM+Cjwvc3ZnPgo="></span>
                                            <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Facebook</span></div>
                                            <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                         </a>-->
                                                    <a href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" data-v-f669de34="" type="button" class="btn-auth btn-auth-google mt-4 hidden overflow-hidden lg:flex">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                    <a data-v-f669de34="" href="<?=$url.'?'.urldecode(http_build_query($params_g))?>" class="btn-auth btn-auth-google mt-4 flex overflow-hidden lg:hidden">
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0 text-center"><img data-v-f669de34="" alt="Google" class="mx-auto w-6" src="<?=Yii::$app->request->baseUrl?>/img/icon-google.feb7947.svg"></span>
                                                        <div data-v-f669de34="" class="grow truncate px-2 text-center"><span data-v-f669de34="" class="truncate">Login with Google</span></div>
                                                        <span data-v-f669de34="" class="w-[50px] shrink-0"></span>
                                                    </a>
                                                </div>
                                                <div class="my-8 flex items-center text-[#7F828A]"><span class="h-px w-full grow bg-[#ddd]"></span> <span class="whitespace-nowrap px-4">or sign in using email</span> <span class="h-px w-full grow bg-[#ddd]"></span></div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="text"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Email</span></label> <!---->
                                                </div>
                                            </div>
                                            <div class="">
                                                <div data-v-06f78498="" class="floatlabel">
                                                    <input data-v-06f78498="" placeholder=" " type="password"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3">Password</span></label> <!---->
                                                </div>
                                            </div>
                                            <div class="!mt-2 text-right"><button type="button" class="hover:underline">
                                                    Forgot your password?
                                                </button>
                                            </div>
                                            <div class="!mt-5 text-center">
                                                <button type="submit" class="btn btn-auth w-full rounded-[5px] py-2.5 text-[17px] leading-[26px]">
                                                    <div style="display: none;">
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent; display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_413">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_413)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-10.607687950134277 C1.5,-10.607687950134277 1.5,10.607687950134277 1.5,10.607687950134277 C1.5,11.435538291931152 0.8278499841690063,12.107687950134277 0,12.107687950134277 C0,12.107687950134277 0,12.107687950134277 0,12.107687950134277 C-0.8278499841690063,12.107687950134277 -1.5,11.435538291931152 -1.5,10.607687950134277 C-1.5,10.607687950134277 -1.5,-10.607687950134277 -1.5,-10.607687950134277 C-1.5,-11.435538291931152 -0.8278499841690063,-12.107687950134277 0,-12.107687950134277 C0,-12.107687950134277 0,-12.107687950134277 0,-12.107687950134277 C0.8278499841690063,-12.107687950134277 1.5,-11.435538291931152 1.5,-10.607687950134277z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-10.607687950134277 C1.5,-10.607687950134277 1.5,10.607687950134277 1.5,10.607687950134277 C1.5,11.435538291931152 0.8278499841690063,12.107687950134277 0,12.107687950134277 C0,12.107687950134277 0,12.107687950134277 0,12.107687950134277 C-0.8278499841690063,12.107687950134277 -1.5,11.435538291931152 -1.5,10.607687950134277 C-1.5,10.607687950134277 -1.5,-10.607687950134277 -1.5,-10.607687950134277 C-1.5,-11.435538291931152 -0.8278499841690063,-12.107687950134277 0,-12.107687950134277 C0,-12.107687950134277 0,-12.107687950134277 0,-12.107687950134277 C0.8278499841690063,-12.107687950134277 1.5,-11.435538291931152 1.5,-10.607687950134277z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.3535027503967285 C1.5,-1.3535027503967285 1.5,1.3535027503967285 1.5,1.3535027503967285 C1.5,2.1813528537750244 0.8278499841690063,2.8535027503967285 0,2.8535027503967285 C0,2.8535027503967285 0,2.8535027503967285 0,2.8535027503967285 C-0.8278499841690063,2.8535027503967285 -1.5,2.1813528537750244 -1.5,1.3535027503967285 C-1.5,1.3535027503967285 -1.5,-1.3535027503967285 -1.5,-1.3535027503967285 C-1.5,-2.1813528537750244 -0.8278499841690063,-2.8535027503967285 0,-2.8535027503967285 C0,-2.8535027503967285 0,-2.8535027503967285 0,-2.8535027503967285 C0.8278499841690063,-2.8535027503967285 1.5,-2.1813528537750244 1.5,-1.3535027503967285z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.3535027503967285 C1.5,-1.3535027503967285 1.5,1.3535027503967285 1.5,1.3535027503967285 C1.5,2.1813528537750244 0.8278499841690063,2.8535027503967285 0,2.8535027503967285 C0,2.8535027503967285 0,2.8535027503967285 0,2.8535027503967285 C-0.8278499841690063,2.8535027503967285 -1.5,2.1813528537750244 -1.5,1.3535027503967285 C-1.5,1.3535027503967285 -1.5,-1.3535027503967285 -1.5,-1.3535027503967285 C-1.5,-2.1813528537750244 -0.8278499841690063,-2.8535027503967285 0,-2.8535027503967285 C0,-2.8535027503967285 0,-2.8535027503967285 0,-2.8535027503967285 C0.8278499841690063,-2.8535027503967285 1.5,-2.1813528537750244 1.5,-1.3535027503967285z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.473626971244812 C1.5,-0.473626971244812 1.5,0.473626971244812 1.5,0.473626971244812 C1.5,1.3014769554138184 0.8278499841690063,1.973626971244812 0,1.973626971244812 C0,1.973626971244812 0,1.973626971244812 0,1.973626971244812 C-0.8278499841690063,1.973626971244812 -1.5,1.3014769554138184 -1.5,0.473626971244812 C-1.5,0.473626971244812 -1.5,-0.473626971244812 -1.5,-0.473626971244812 C-1.5,-1.3014769554138184 -0.8278499841690063,-1.973626971244812 0,-1.973626971244812 C0,-1.973626971244812 0,-1.973626971244812 0,-1.973626971244812 C0.8278499841690063,-1.973626971244812 1.5,-1.3014769554138184 1.5,-0.473626971244812z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.473626971244812 C1.5,-0.473626971244812 1.5,0.473626971244812 1.5,0.473626971244812 C1.5,1.3014769554138184 0.8278499841690063,1.973626971244812 0,1.973626971244812 C0,1.973626971244812 0,1.973626971244812 0,1.973626971244812 C-0.8278499841690063,1.973626971244812 -1.5,1.3014769554138184 -1.5,0.473626971244812 C-1.5,0.473626971244812 -1.5,-0.473626971244812 -1.5,-0.473626971244812 C-1.5,-1.3014769554138184 -0.8278499841690063,-1.973626971244812 0,-1.973626971244812 C0,-1.973626971244812 0,-1.973626971244812 0,-1.973626971244812 C0.8278499841690063,-1.973626971244812 1.5,-1.3014769554138184 1.5,-0.473626971244812z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-4.165206432342529 C1.5,-4.165206432342529 1.5,4.165206432342529 1.5,4.165206432342529 C1.5,4.993056297302246 0.8278499841690063,5.665206432342529 0,5.665206432342529 C0,5.665206432342529 0,5.665206432342529 0,5.665206432342529 C-0.8278499841690063,5.665206432342529 -1.5,4.993056297302246 -1.5,4.165206432342529 C-1.5,4.165206432342529 -1.5,-4.165206432342529 -1.5,-4.165206432342529 C-1.5,-4.993056297302246 -0.8278499841690063,-5.665206432342529 0,-5.665206432342529 C0,-5.665206432342529 0,-5.665206432342529 0,-5.665206432342529 C0.8278499841690063,-5.665206432342529 1.5,-4.993056297302246 1.5,-4.165206432342529z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.165206432342529 C1.5,-4.165206432342529 1.5,4.165206432342529 1.5,4.165206432342529 C1.5,4.993056297302246 0.8278499841690063,5.665206432342529 0,5.665206432342529 C0,5.665206432342529 0,5.665206432342529 0,5.665206432342529 C-0.8278499841690063,5.665206432342529 -1.5,4.993056297302246 -1.5,4.165206432342529 C-1.5,4.165206432342529 -1.5,-4.165206432342529 -1.5,-4.165206432342529 C-1.5,-4.993056297302246 -0.8278499841690063,-5.665206432342529 0,-5.665206432342529 C0,-5.665206432342529 0,-5.665206432342529 0,-5.665206432342529 C0.8278499841690063,-5.665206432342529 1.5,-4.993056297302246 1.5,-4.165206432342529z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.7534458041191101 0.8882604241371155,1.3651853799819946 0.13481462001800537,1.3651853799819946 C0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 C-0.8882604241371155,1.3651853799819946 -1.5,0.7534458041191101 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.7534458041191101 -0.8882604241371155,-1.3651853799819946 -0.13481462001800537,-1.3651853799819946 C-0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 C0.8882604241371155,-1.3651853799819946 1.5,-0.7534458041191101 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.7534458041191101 0.8882604241371155,1.3651853799819946 0.13481462001800537,1.3651853799819946 C0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 C-0.8882604241371155,1.3651853799819946 -1.5,0.7534458041191101 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.7534458041191101 -0.8882604241371155,-1.3651853799819946 -0.13481462001800537,-1.3651853799819946 C-0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 C0.8882604241371155,-1.3651853799819946 1.5,-0.7534458041191101 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.7776446342468262 C1.5,-0.7776446342468262 1.5,0.7776446342468262 1.5,0.7776446342468262 C1.5,1.6054946184158325 0.8278499841690063,2.277644634246826 0,2.277644634246826 C0,2.277644634246826 0,2.277644634246826 0,2.277644634246826 C-0.8278499841690063,2.277644634246826 -1.5,1.6054946184158325 -1.5,0.7776446342468262 C-1.5,0.7776446342468262 -1.5,-0.7776446342468262 -1.5,-0.7776446342468262 C-1.5,-1.6054946184158325 -0.8278499841690063,-2.277644634246826 0,-2.277644634246826 C0,-2.277644634246826 0,-2.277644634246826 0,-2.277644634246826 C0.8278499841690063,-2.277644634246826 1.5,-1.6054946184158325 1.5,-0.7776446342468262z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7776446342468262 C1.5,-0.7776446342468262 1.5,0.7776446342468262 1.5,0.7776446342468262 C1.5,1.6054946184158325 0.8278499841690063,2.277644634246826 0,2.277644634246826 C0,2.277644634246826 0,2.277644634246826 0,2.277644634246826 C-0.8278499841690063,2.277644634246826 -1.5,1.6054946184158325 -1.5,0.7776446342468262 C-1.5,0.7776446342468262 -1.5,-0.7776446342468262 -1.5,-0.7776446342468262 C-1.5,-1.6054946184158325 -0.8278499841690063,-2.277644634246826 0,-2.277644634246826 C0,-2.277644634246826 0,-2.277644634246826 0,-2.277644634246826 C0.8278499841690063,-2.277644634246826 1.5,-1.6054946184158325 1.5,-0.7776446342468262z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.8866176605224609 C1.5,-0.8866176605224609 1.5,0.8866176605224609 1.5,0.8866176605224609 C1.5,1.7144676446914673 0.8278499841690063,2.386617660522461 0,2.386617660522461 C0,2.386617660522461 0,2.386617660522461 0,2.386617660522461 C-0.8278499841690063,2.386617660522461 -1.5,1.7144676446914673 -1.5,0.8866176605224609 C-1.5,0.8866176605224609 -1.5,-0.8866176605224609 -1.5,-0.8866176605224609 C-1.5,-1.7144676446914673 -0.8278499841690063,-2.386617660522461 0,-2.386617660522461 C0,-2.386617660522461 0,-2.386617660522461 0,-2.386617660522461 C0.8278499841690063,-2.386617660522461 1.5,-1.7144676446914673 1.5,-0.8866176605224609z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8866176605224609 C1.5,-0.8866176605224609 1.5,0.8866176605224609 1.5,0.8866176605224609 C1.5,1.7144676446914673 0.8278499841690063,2.386617660522461 0,2.386617660522461 C0,2.386617660522461 0,2.386617660522461 0,2.386617660522461 C-0.8278499841690063,2.386617660522461 -1.5,1.7144676446914673 -1.5,0.8866176605224609 C-1.5,0.8866176605224609 -1.5,-0.8866176605224609 -1.5,-0.8866176605224609 C-1.5,-1.7144676446914673 -0.8278499841690063,-2.386617660522461 0,-2.386617660522461 C0,-2.386617660522461 0,-2.386617660522461 0,-2.386617660522461 C0.8278499841690063,-2.386617660522461 1.5,-1.7144676446914673 1.5,-0.8866176605224609z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(255,255,255)" fill-opacity="1" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="!w-full !h-[26px]" style="width: 200px; height: 200px; background: transparent;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 312 40" width="312" height="40" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px); content-visibility: visible;">
                                                                <defs>
                                                                    <clipPath id="__lottie_element_277">
                                                                        <rect width="312" height="40" x="0" y="0"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <g clip-path="url(#__lottie_element_277)">
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,162.2270050048828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-10.607687950134277 C1.5,-10.607687950134277 1.5,10.607687950134277 1.5,10.607687950134277 C1.5,11.435538291931152 0.8278499841690063,12.107687950134277 0,12.107687950134277 C0,12.107687950134277 0,12.107687950134277 0,12.107687950134277 C-0.8278499841690063,12.107687950134277 -1.5,11.435538291931152 -1.5,10.607687950134277 C-1.5,10.607687950134277 -1.5,-10.607687950134277 -1.5,-10.607687950134277 C-1.5,-11.435538291931152 -0.8278499841690063,-12.107687950134277 0,-12.107687950134277 C0,-12.107687950134277 0,-12.107687950134277 0,-12.107687950134277 C0.8278499841690063,-12.107687950134277 1.5,-11.435538291931152 1.5,-10.607687950134277z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-10.607687950134277 C1.5,-10.607687950134277 1.5,10.607687950134277 1.5,10.607687950134277 C1.5,11.435538291931152 0.8278499841690063,12.107687950134277 0,12.107687950134277 C0,12.107687950134277 0,12.107687950134277 0,12.107687950134277 C-0.8278499841690063,12.107687950134277 -1.5,11.435538291931152 -1.5,10.607687950134277 C-1.5,10.607687950134277 -1.5,-10.607687950134277 -1.5,-10.607687950134277 C-1.5,-11.435538291931152 -0.8278499841690063,-12.107687950134277 0,-12.107687950134277 C0,-12.107687950134277 0,-12.107687950134277 0,-12.107687950134277 C0.8278499841690063,-12.107687950134277 1.5,-11.435538291931152 1.5,-10.607687950134277z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,156.31199645996094,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.3535027503967285 C1.5,-1.3535027503967285 1.5,1.3535027503967285 1.5,1.3535027503967285 C1.5,2.1813528537750244 0.8278499841690063,2.8535027503967285 0,2.8535027503967285 C0,2.8535027503967285 0,2.8535027503967285 0,2.8535027503967285 C-0.8278499841690063,2.8535027503967285 -1.5,2.1813528537750244 -1.5,1.3535027503967285 C-1.5,1.3535027503967285 -1.5,-1.3535027503967285 -1.5,-1.3535027503967285 C-1.5,-2.1813528537750244 -0.8278499841690063,-2.8535027503967285 0,-2.8535027503967285 C0,-2.8535027503967285 0,-2.8535027503967285 0,-2.8535027503967285 C0.8278499841690063,-2.8535027503967285 1.5,-2.1813528537750244 1.5,-1.3535027503967285z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.3535027503967285 C1.5,-1.3535027503967285 1.5,1.3535027503967285 1.5,1.3535027503967285 C1.5,2.1813528537750244 0.8278499841690063,2.8535027503967285 0,2.8535027503967285 C0,2.8535027503967285 0,2.8535027503967285 0,2.8535027503967285 C-0.8278499841690063,2.8535027503967285 -1.5,2.1813528537750244 -1.5,1.3535027503967285 C-1.5,1.3535027503967285 -1.5,-1.3535027503967285 -1.5,-1.3535027503967285 C-1.5,-2.1813528537750244 -0.8278499841690063,-2.8535027503967285 0,-2.8535027503967285 C0,-2.8535027503967285 0,-2.8535027503967285 0,-2.8535027503967285 C0.8278499841690063,-2.8535027503967285 1.5,-2.1813528537750244 1.5,-1.3535027503967285z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,168.14199829101562,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,174.0570068359375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,150.3979949951172,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-6.8287763595581055 C1.5,-6.8287763595581055 1.5,6.8287763595581055 1.5,6.8287763595581055 C1.5,7.656626224517822 0.8278499841690063,8.328776359558105 0,8.328776359558105 C0,8.328776359558105 0,8.328776359558105 0,8.328776359558105 C-0.8278499841690063,8.328776359558105 -1.5,7.656626224517822 -1.5,6.8287763595581055 C-1.5,6.8287763595581055 -1.5,-6.8287763595581055 -1.5,-6.8287763595581055 C-1.5,-7.656626224517822 -0.8278499841690063,-8.328776359558105 0,-8.328776359558105 C0,-8.328776359558105 0,-8.328776359558105 0,-8.328776359558105 C0.8278499841690063,-8.328776359558105 1.5,-7.656626224517822 1.5,-6.8287763595581055z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,144.48300170898438,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.5851569175720215 C1.5,-0.5851569175720215 1.5,0.5851569175720215 1.5,0.5851569175720215 C1.5,1.4130069017410278 0.8278499841690063,2.0851569175720215 0,2.0851569175720215 C0,2.0851569175720215 0,2.0851569175720215 0,2.0851569175720215 C-0.8278499841690063,2.0851569175720215 -1.5,1.4130069017410278 -1.5,0.5851569175720215 C-1.5,0.5851569175720215 -1.5,-0.5851569175720215 -1.5,-0.5851569175720215 C-1.5,-1.4130069017410278 -0.8278499841690063,-2.0851569175720215 0,-2.0851569175720215 C0,-2.0851569175720215 0,-2.0851569175720215 0,-2.0851569175720215 C0.8278499841690063,-2.0851569175720215 1.5,-1.4130069017410278 1.5,-0.5851569175720215z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,179.9709930419922,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,138.5679931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,185.88600158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,132.6529998779297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.473626971244812 C1.5,-0.473626971244812 1.5,0.473626971244812 1.5,0.473626971244812 C1.5,1.3014769554138184 0.8278499841690063,1.973626971244812 0,1.973626971244812 C0,1.973626971244812 0,1.973626971244812 0,1.973626971244812 C-0.8278499841690063,1.973626971244812 -1.5,1.3014769554138184 -1.5,0.473626971244812 C-1.5,0.473626971244812 -1.5,-0.473626971244812 -1.5,-0.473626971244812 C-1.5,-1.3014769554138184 -0.8278499841690063,-1.973626971244812 0,-1.973626971244812 C0,-1.973626971244812 0,-1.973626971244812 0,-1.973626971244812 C0.8278499841690063,-1.973626971244812 1.5,-1.3014769554138184 1.5,-0.473626971244812z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.473626971244812 C1.5,-0.473626971244812 1.5,0.473626971244812 1.5,0.473626971244812 C1.5,1.3014769554138184 0.8278499841690063,1.973626971244812 0,1.973626971244812 C0,1.973626971244812 0,1.973626971244812 0,1.973626971244812 C-0.8278499841690063,1.973626971244812 -1.5,1.3014769554138184 -1.5,0.473626971244812 C-1.5,0.473626971244812 -1.5,-0.473626971244812 -1.5,-0.473626971244812 C-1.5,-1.3014769554138184 -0.8278499841690063,-1.973626971244812 0,-1.973626971244812 C0,-1.973626971244812 0,-1.973626971244812 0,-1.973626971244812 C0.8278499841690063,-1.973626971244812 1.5,-1.3014769554138184 1.5,-0.473626971244812z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,191.80099487304688,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-4.165206432342529 C1.5,-4.165206432342529 1.5,4.165206432342529 1.5,4.165206432342529 C1.5,4.993056297302246 0.8278499841690063,5.665206432342529 0,5.665206432342529 C0,5.665206432342529 0,5.665206432342529 0,5.665206432342529 C-0.8278499841690063,5.665206432342529 -1.5,4.993056297302246 -1.5,4.165206432342529 C-1.5,4.165206432342529 -1.5,-4.165206432342529 -1.5,-4.165206432342529 C-1.5,-4.993056297302246 -0.8278499841690063,-5.665206432342529 0,-5.665206432342529 C0,-5.665206432342529 0,-5.665206432342529 0,-5.665206432342529 C0.8278499841690063,-5.665206432342529 1.5,-4.993056297302246 1.5,-4.165206432342529z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-4.165206432342529 C1.5,-4.165206432342529 1.5,4.165206432342529 1.5,4.165206432342529 C1.5,4.993056297302246 0.8278499841690063,5.665206432342529 0,5.665206432342529 C0,5.665206432342529 0,5.665206432342529 0,5.665206432342529 C-0.8278499841690063,5.665206432342529 -1.5,4.993056297302246 -1.5,4.165206432342529 C-1.5,4.165206432342529 -1.5,-4.165206432342529 -1.5,-4.165206432342529 C-1.5,-4.993056297302246 -0.8278499841690063,-5.665206432342529 0,-5.665206432342529 C0,-5.665206432342529 0,-5.665206432342529 0,-5.665206432342529 C0.8278499841690063,-5.665206432342529 1.5,-4.993056297302246 1.5,-4.165206432342529z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,197.71600341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,126.73899841308594,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.7534458041191101 0.8882604241371155,1.3651853799819946 0.13481462001800537,1.3651853799819946 C0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 C-0.8882604241371155,1.3651853799819946 -1.5,0.7534458041191101 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.7534458041191101 -0.8882604241371155,-1.3651853799819946 -0.13481462001800537,-1.3651853799819946 C-0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 C0.8882604241371155,-1.3651853799819946 1.5,-0.7534458041191101 1.5,0z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,0 C1.5,0 1.5,0 1.5,0 C1.5,0.7534458041191101 0.8882604241371155,1.3651853799819946 0.13481462001800537,1.3651853799819946 C0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 -0.13481462001800537,1.3651853799819946 C-0.8882604241371155,1.3651853799819946 -1.5,0.7534458041191101 -1.5,0 C-1.5,0 -1.5,0 -1.5,0 C-1.5,-0.7534458041191101 -0.8882604241371155,-1.3651853799819946 -0.13481462001800537,-1.3651853799819946 C-0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 0.13481462001800537,-1.3651853799819946 C0.8882604241371155,-1.3651853799819946 1.5,-0.7534458041191101 1.5,0z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,120.8239974975586,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,114.90899658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,203.63099670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,209.5449981689453,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8725314140319824 C1.5,-0.8725314140319824 1.5,0.8725314140319824 1.5,0.8725314140319824 C1.5,1.7003813982009888 0.8278499841690063,2.3725314140319824 0,2.3725314140319824 C0,2.3725314140319824 0,2.3725314140319824 0,2.3725314140319824 C-0.8278499841690063,2.3725314140319824 -1.5,1.7003813982009888 -1.5,0.8725314140319824 C-1.5,0.8725314140319824 -1.5,-0.8725314140319824 -1.5,-0.8725314140319824 C-1.5,-1.7003813982009888 -0.8278499841690063,-2.3725314140319824 0,-2.3725314140319824 C0,-2.3725314140319824 0,-2.3725314140319824 0,-2.3725314140319824 C0.8278499841690063,-2.3725314140319824 1.5,-1.7003813982009888 1.5,-0.8725314140319824z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,108.99400329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,215.4600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,221.375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,227.2899932861328,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,103.0790023803711,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,233.20399475097656,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,97.16500091552734,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,239.11900329589844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,91.25,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,245.03399658203125,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,256.864013671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,250.94900512695312,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,85.33499908447266,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.3576884269714355 C1.5,-3.3576884269714355 1.5,3.3576884269714355 1.5,3.3576884269714355 C1.5,4.185538291931152 0.8278499841690063,4.8576884269714355 0,4.8576884269714355 C0,4.8576884269714355 0,4.8576884269714355 0,4.8576884269714355 C-0.8278499841690063,4.8576884269714355 -1.5,4.185538291931152 -1.5,3.3576884269714355 C-1.5,3.3576884269714355 -1.5,-3.3576884269714355 -1.5,-3.3576884269714355 C-1.5,-4.185538291931152 -0.8278499841690063,-4.8576884269714355 0,-4.8576884269714355 C0,-4.8576884269714355 0,-4.8576884269714355 0,-4.8576884269714355 C0.8278499841690063,-4.8576884269714355 1.5,-4.185538291931152 1.5,-3.3576884269714355z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,79.41999816894531,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.3318086862564087 C1.5,-0.3318086862564087 1.5,0.3318086862564087 1.5,0.3318086862564087 C1.5,1.159658670425415 0.8278499841690063,1.8318086862564087 0,1.8318086862564087 C0,1.8318086862564087 0,1.8318086862564087 0,1.8318086862564087 C-0.8278499841690063,1.8318086862564087 -1.5,1.159658670425415 -1.5,0.3318086862564087 C-1.5,0.3318086862564087 -1.5,-0.3318086862564087 -1.5,-0.3318086862564087 C-1.5,-1.159658670425415 -0.8278499841690063,-1.8318086862564087 0,-1.8318086862564087 C0,-1.8318086862564087 0,-1.8318086862564087 0,-1.8318086862564087 C0.8278499841690063,-1.8318086862564087 1.5,-1.159658670425415 1.5,-0.3318086862564087z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,73.50599670410156,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,262.77801513671875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-3.4727864265441895 C1.5,-3.4727864265441895 1.5,3.4727864265441895 1.5,3.4727864265441895 C1.5,4.300636291503906 0.8278499841690063,4.9727864265441895 0,4.9727864265441895 C0,4.9727864265441895 0,4.9727864265441895 0,4.9727864265441895 C-0.8278499841690063,4.9727864265441895 -1.5,4.300636291503906 -1.5,3.4727864265441895 C-1.5,3.4727864265441895 -1.5,-3.4727864265441895 -1.5,-3.4727864265441895 C-1.5,-4.300636291503906 -0.8278499841690063,-4.9727864265441895 0,-4.9727864265441895 C0,-4.9727864265441895 0,-4.9727864265441895 0,-4.9727864265441895 C0.8278499841690063,-4.9727864265441895 1.5,-4.300636291503906 1.5,-3.4727864265441895z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,67.59100341796875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,268.6929931640625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.6085245609283447 C1.5,-0.6085245609283447 1.5,0.6085245609283447 1.5,0.6085245609283447 C1.5,1.436374545097351 0.8278499841690063,2.1085245609283447 0,2.1085245609283447 C0,2.1085245609283447 0,2.1085245609283447 0,2.1085245609283447 C-0.8278499841690063,2.1085245609283447 -1.5,1.436374545097351 -1.5,0.6085245609283447 C-1.5,0.6085245609283447 -1.5,-0.6085245609283447 -1.5,-0.6085245609283447 C-1.5,-1.436374545097351 -0.8278499841690063,-2.1085245609283447 0,-2.1085245609283447 C0,-2.1085245609283447 0,-2.1085245609283447 0,-2.1085245609283447 C0.8278499841690063,-2.1085245609283447 1.5,-1.436374545097351 1.5,-0.6085245609283447z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,274.6080017089844,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,61.67599868774414,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-1.299860954284668 C1.5,-1.299860954284668 1.5,1.299860954284668 1.5,1.299860954284668 C1.5,2.127711057662964 0.8278499841690063,2.799860954284668 0,2.799860954284668 C0,2.799860954284668 0,2.799860954284668 0,2.799860954284668 C-0.8278499841690063,2.799860954284668 -1.5,2.127711057662964 -1.5,1.299860954284668 C-1.5,1.299860954284668 -1.5,-1.299860954284668 -1.5,-1.299860954284668 C-1.5,-2.127711057662964 -0.8278499841690063,-2.799860954284668 0,-2.799860954284668 C0,-2.799860954284668 0,-2.799860954284668 0,-2.799860954284668 C0.8278499841690063,-2.799860954284668 1.5,-2.127711057662964 1.5,-1.299860954284668z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,55.76100158691406,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,49.84600067138672,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7123570442199707 C1.5,-0.7123570442199707 1.5,0.7123570442199707 1.5,0.7123570442199707 C1.5,1.540207028388977 0.8278499841690063,2.2123570442199707 0,2.2123570442199707 C0,2.2123570442199707 0,2.2123570442199707 0,2.2123570442199707 C-0.8278499841690063,2.2123570442199707 -1.5,1.540207028388977 -1.5,0.7123570442199707 C-1.5,0.7123570442199707 -1.5,-0.7123570442199707 -1.5,-0.7123570442199707 C-1.5,-1.540207028388977 -0.8278499841690063,-2.2123570442199707 0,-2.2123570442199707 C0,-2.2123570442199707 0,-2.2123570442199707 0,-2.2123570442199707 C0.8278499841690063,-2.2123570442199707 1.5,-1.540207028388977 1.5,-0.7123570442199707z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,43.93199920654297,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-2.8443102836608887 C1.5,-2.8443102836608887 1.5,2.8443102836608887 1.5,2.8443102836608887 C1.5,3.6721603870391846 0.8278499841690063,4.344310283660889 0,4.344310283660889 C0,4.344310283660889 0,4.344310283660889 0,4.344310283660889 C-0.8278499841690063,4.344310283660889 -1.5,3.6721603870391846 -1.5,2.8443102836608887 C-1.5,2.8443102836608887 -1.5,-2.8443102836608887 -1.5,-2.8443102836608887 C-1.5,-3.6721603870391846 -0.8278499841690063,-4.344310283660889 0,-4.344310283660889 C0,-4.344310283660889 0,-4.344310283660889 0,-4.344310283660889 C0.8278499841690063,-4.344310283660889 1.5,-3.6721603870391846 1.5,-2.8443102836608887z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,280.52301025390625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.776707649230957 C1.5,-0.776707649230957 1.5,0.776707649230957 1.5,0.776707649230957 C1.5,1.6045576333999634 0.8278499841690063,2.276707649230957 0,2.276707649230957 C0,2.276707649230957 0,2.276707649230957 0,2.276707649230957 C-0.8278499841690063,2.276707649230957 -1.5,1.6045576333999634 -1.5,0.776707649230957 C-1.5,0.776707649230957 -1.5,-0.776707649230957 -1.5,-0.776707649230957 C-1.5,-1.6045576333999634 -0.8278499841690063,-2.276707649230957 0,-2.276707649230957 C0,-2.276707649230957 0,-2.276707649230957 0,-2.276707649230957 C0.8278499841690063,-2.276707649230957 1.5,-1.6045576333999634 1.5,-0.776707649230957z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,38.016998291015625,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,286.43701171875,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.7776446342468262 C1.5,-0.7776446342468262 1.5,0.7776446342468262 1.5,0.7776446342468262 C1.5,1.6054946184158325 0.8278499841690063,2.277644634246826 0,2.277644634246826 C0,2.277644634246826 0,2.277644634246826 0,2.277644634246826 C-0.8278499841690063,2.277644634246826 -1.5,1.6054946184158325 -1.5,0.7776446342468262 C-1.5,0.7776446342468262 -1.5,-0.7776446342468262 -1.5,-0.7776446342468262 C-1.5,-1.6054946184158325 -0.8278499841690063,-2.277644634246826 0,-2.277644634246826 C0,-2.277644634246826 0,-2.277644634246826 0,-2.277644634246826 C0.8278499841690063,-2.277644634246826 1.5,-1.6054946184158325 1.5,-0.7776446342468262z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.7776446342468262 C1.5,-0.7776446342468262 1.5,0.7776446342468262 1.5,0.7776446342468262 C1.5,1.6054946184158325 0.8278499841690063,2.277644634246826 0,2.277644634246826 C0,2.277644634246826 0,2.277644634246826 0,2.277644634246826 C-0.8278499841690063,2.277644634246826 -1.5,1.6054946184158325 -1.5,0.7776446342468262 C-1.5,0.7776446342468262 -1.5,-0.7776446342468262 -1.5,-0.7776446342468262 C-1.5,-1.6054946184158325 -0.8278499841690063,-2.277644634246826 0,-2.277644634246826 C0,-2.277644634246826 0,-2.277644634246826 0,-2.277644634246826 C0.8278499841690063,-2.277644634246826 1.5,-1.6054946184158325 1.5,-0.7776446342468262z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,32.10199737548828,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.8866176605224609 C1.5,-0.8866176605224609 1.5,0.8866176605224609 1.5,0.8866176605224609 C1.5,1.7144676446914673 0.8278499841690063,2.386617660522461 0,2.386617660522461 C0,2.386617660522461 0,2.386617660522461 0,2.386617660522461 C-0.8278499841690063,2.386617660522461 -1.5,1.7144676446914673 -1.5,0.8866176605224609 C-1.5,0.8866176605224609 -1.5,-0.8866176605224609 -1.5,-0.8866176605224609 C-1.5,-1.7144676446914673 -0.8278499841690063,-2.386617660522461 0,-2.386617660522461 C0,-2.386617660522461 0,-2.386617660522461 0,-2.386617660522461 C0.8278499841690063,-2.386617660522461 1.5,-1.7144676446914673 1.5,-0.8866176605224609z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.8866176605224609 C1.5,-0.8866176605224609 1.5,0.8866176605224609 1.5,0.8866176605224609 C1.5,1.7144676446914673 0.8278499841690063,2.386617660522461 0,2.386617660522461 C0,2.386617660522461 0,2.386617660522461 0,2.386617660522461 C-0.8278499841690063,2.386617660522461 -1.5,1.7144676446914673 -1.5,0.8866176605224609 C-1.5,0.8866176605224609 -1.5,-0.8866176605224609 -1.5,-0.8866176605224609 C-1.5,-1.7144676446914673 -0.8278499841690063,-2.386617660522461 0,-2.386617660522461 C0,-2.386617660522461 0,-2.386617660522461 0,-2.386617660522461 C0.8278499841690063,-2.386617660522461 1.5,-1.7144676446914673 1.5,-0.8866176605224609z"></path>
                                                                        </g>
                                                                    </g>
                                                                    <g transform="matrix(1,0,0,0.8999999761581421,292.35198974609375,20.674999237060547)" opacity="1" style="display: block;">
                                                                        <g opacity="1" transform="matrix(1,0,0,1,-7.625,-0.75)">
                                                                            <path fill="rgb(0,0,0)" fill-opacity="1" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                            <path stroke-linecap="butt" stroke-linejoin="miter" fill-opacity="0" stroke-miterlimit="4" stroke="rgb(0,0,0)" stroke-opacity="1" stroke-width="0" d=" M1.5,-0.976689338684082 C1.5,-0.976689338684082 1.5,0.976689338684082 1.5,0.976689338684082 C1.5,1.8045393228530884 0.8278499841690063,2.476689338684082 0,2.476689338684082 C0,2.476689338684082 0,2.476689338684082 0,2.476689338684082 C-0.8278499841690063,2.476689338684082 -1.5,1.8045393228530884 -1.5,0.976689338684082 C-1.5,0.976689338684082 -1.5,-0.976689338684082 -1.5,-0.976689338684082 C-1.5,-1.8045393228530884 -0.8278499841690063,-2.476689338684082 0,-2.476689338684082 C0,-2.476689338684082 0,-2.476689338684082 0,-2.476689338684082 C0.8278499841690063,-2.476689338684082 1.5,-1.8045393228530884 1.5,-0.976689338684082z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <span>Sign in</span>
                                                </button>
                                                <p class="mt-7 leading-[18px]">
                                                    <span class="mr-2">Not a member?</span>
                                                    <button type="button" class="btn_create_account inline-flex items-center font-medium text-[#101010] hover:underline dark:text-white">
                                                        Create account
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="ml-1">
                                                            <path d="M4.71229 9.95496L8.4246 6.24265L4.71229 2.53034L5.77295 1.46968L10.5459 6.24266L5.77295 11.0156L4.71229 9.95496Z" fill="currentColor"></path>
                                                            <path d="M10 6.25C10 6.66421 9.66421 7 9.25 7L1 7L1 5.5L9.25 5.5C9.66421 5.5 10 5.83579 10 6.25Z" fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!----> <!----> <!----> <!---->
                <div class="hidden">
                    <audio "status"="pause" id="myaudio">
                    <source data-src="http://vintapes.com/modx/media/okean-elzi-vse-bude-dobre.mp3" type="audio/mpeg" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=">
                    </audio>
                </div>
                <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
            </div>
        </div>
    </div>

    <form style="visibillity:hidden" id="freReg" action="https://vintapes.com/user/create_account" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <input data-v-06f78498="" placeholder=" " type="hidden" name="fullname" value="TestUser"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3"></span></label> <!---->
        <input data-v-06f78498="" placeholder=" " type="hidden" name="email" id="freeEmail" value='testt@gmail.com'> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3"></span></label> <!---->
        <input data-v-06f78498="" placeholder=" " type="hidden" name="password" value="123456789"> <label data-v-06f78498=""><span data-v-06f78498="" class="ml-3"></span></label> <!---->
    </form>


    <?php $this->endBody();?>
    <script>
        function freeBy(){
            let checkWant = confirm('Do You want by free?')
            if(checkWant){
                let strFree = 'free_'+randomString(12)+'@.gmail.com'
                document.getElementById("freeEmail").value = strFree

                document.getElementById('freReg').submit()}
        }


        function randomString(i) {
            var rnd = '';
            while (rnd.length < i)
                rnd += Math.random().toString(36).substring(2);
            return rnd.substring(0, i);
        };

    </script>


    <style>
        .play-btn, .authoBlock{
            display: none;
        }


        .testImg{
            display: none;
        }



        @media(min-width:1000px){
            .MyFontMedium{
                padding-top: 7%;
            }
        }


        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }
        /* --swiper-theme-color:white; */
        .swiper-pagination-bullet{
            background:white;
        }

        .myBottom{
            padding-right:15px;
        }


        @media(max-width:450px) {
            .testImg {
                display: none !important;
            }
            .img-slider{
                width: 180px;
                height: 150px;
                display: block;
                margin: 0 auto;
                /* margin-top: 15%; */
                margin-bottom: 2%;
            }
            .absolute{
                position: relative;
            }

        }


        @media(max-width:465px){
            .w-full{
                margin-top: -10px;
                padding-top: 0px;
            }
            .font-medium{
                margin-top:10px;
            }
        }


        @media(min-width:408px) and (max-width:450px){
            .mySwiper{
                height:523px !important;
            }
        }


        @media(min-width:450px) and (max-width:771px) {
            .testImg {
                display: none !important;
            }
            /* .myTop img */
            .img-slider{
                /*         width: 100%;*/
                width: 230px;
                height: 80%;
                display: block;
                margin: 0 auto;
                margin:0px !important;
                /* margin-top: 15%; */
                /* margin-left: 4%; */
                margin-bottom: 2%;
            }
            .absolute{
                position: relative;
            }
            .myTop{
                height:auto;
            }

            .myBottom{
                /* height:120px; */
                /*overflow:hidden; */
                margin-top:-25%;
            }
            .myTagP{
                overflow: hidden;
                height:90px;
            }

            .mySwiper{
                height:600px !important;

            }
            .mySwipNext, .mySwipPrev{
                top:96%;
                color:white;
            }
        }
        @media(min-width:320px) and (max-width:450px) {
            .img-slider{
                height: auto;
            }

            .myTop{
                height:auto;
            }
            .myTagP{
                overflow: hidden;
            }

            .myBottom h2{
                height:80px;
                overflow: hidden;
            }
            .myTagP{
                height:40px !important;
                overflow:hidden;
                margin-bottom: 20px;
            }
            .swiper-pagination-horizontal{
                display: none;
            }


        }


        @media(min-width:320px) and (max-width:770px){
            .dot{
                margin-left: -70%;
            }
            .relative{
                display: flex;
            }
            .swiper-pagination{
                display: none;
            }
            .mySwiper{
                margin-top: 17%;
            }
            .MyFontMedium{
                text-align: center;
            }
            .myTagP{
                text-align: center;
            }
        }


        @media(min-width:449px ) and (max-width: 770px){
            .myTop img{
                margin: 0 auto !important;
            }
            .myBottom{
                margin-top: 5%;
            }
            .mySwipNext, .mySwipPrev{
                top:25% !important;
            }
            .mySwiper{
                margin-top: 10%;
            }
        }
        /*761-768*/

        @media(min-width: 761px) and (max-width:768px){
            .myTop{
                margin-left: 0px !important;
            }
            .myBottom {
                margin-top: 5% !important;
            }
        }

        @media(min-width:772px) and (max-width:1300px){
            .myTagP{
                height:152px !important;
                overflow:hidden;
                /* margin-bottom: 20px; */
            }
            .myBottom h2{
                height:45px;
                overflow: hidden;
            }
            .swiper-pagination{
                display: none;
            }
        }


        /* 1024 - 1026 */
        @media(min-width:772px) and (max-width:1025px) {
            .myFlex{
                /* background:red; */
                display: flex !important;
                flex-direction: column !important;

                /* flex-direction: row-reverse;  */
            }
            .myTop{
                /* order:2; */
                position: relative;
                z-index: 1;
                height:auto;
                padding-top:0px !important;
                margin-top: 7%;
            }
            .img-slider{
                height:auto;
                margin:0px;
            }
            .myBottom{
                /*background:black;*/
                opacity: 0.8;
                margin-top:-65.5%;
                position: relative;
                height:550px;
                /* order:1; */
                z-index: 2;
                padding-top:10%;
            }
            .mySwipNext, .mySwipPrev{
                /* top:94%; */
                color:white;
            }

        }

        @media(min-width: 1000px) and (max-width: 1026px){
            .myBottom h2 {
                height: 93px;
                overflow:visible;}

        }
        @media(min-width: 1023px) and (max-width: 1026px){
            .swiper-wrapper{
                margin-top: 40%;
            }
            .myTop{
                margin-top:  -26%;
            }
            .btn-white2{
                display: block;
            }
        }



        /* 1026 - 1200 */

        @media(min-width:1026px) and (max-width:1200px) {

            .myBottom h2{
                height:130px;
            }
            .myTop{
                margin-top: -69% !important;
                padding-left: 1% !important;
                padding-top: 0px;
            }


        }



        /* 1024 - 1171  */

        @media(min-width:1026px) and (max-width:1400px) {
            .myTop{
                margin-top:-69% !important;
                height:400px;
            }
            .myBottom{
                height:500px !important;
                margin-top: -10%;

            }
            .img-slider{
                height:400px;
                margin:0px;
            }
            .myFlex{
                padding-top:10%;
                height:400px;
            }
            .myTagP{
                height:132px;
                overflow:hidden;
            }

        }

        @media(min-width: 1025px) and (max-width: 1150px){
            .myTop{
                margin-left: 53% !important;
            }
        }


        @media(min-width:1026px) and (max-width:1200px) {
            .myTop {
                padding-top: 0px;
                padding-left: 8% !important;
            }
            
        }


        @media(min-width:1201px) and (max-width:1400px)  {
            .myFlex{
                flex-direction:row !important;

            }
            .myTop{
                padding-top: 64%;
                padding-left:8% !important;
            }
            .img-slider{

                width:100%;
            }
            .mySwipNext, .mySwipPrev{
                /* top:94%; */
                color:white;
            }
            .myBottom{
                padding-left:1%;
            }
            .myBottom h2{
                height: 110px;
            }
            .MyFontMedium{
                margin-bottom: 5%;
            }


        }





        @media(min-width:1400px)  {
            .myFlex{
                flex-direction:row;

            }
            .myTop{
                padding-top:5%;
                padding-left:15% !important;
            }
            .img-slider{

                width:100%;
            }
            .mySwipNext, .mySwipPrev{
                /* top:94%; */
                color:white;
            }
            .myBottom{
                padding-left:1%;
            }
            .swiper-pagination{
                display: none;
            }
            .swiper-button-next, .swiper-button-prev{
                top: 65%;
            }
            .swiper-wrapper{
                margin-top: 5%;
            }
            .MyFontMedium{
                margin-bottom: 7%;
            }

        }




        @media(min-width:320px) and (max-width:1024px){
            .fa-layers{
                margin-top: 37%;
            }
        }




        @media(min-width:320px) and (max-width:460px){
            .rounded-full>svg{
                display: block !important;
            }


            .swiper-slide>.relative>.absolute{
                display: flex;
            }
        }


        @media(min-width: 1300px) and (max-width: 1400px){
            .swiper-pagination{
                display: none;
            }
        }



        .myFirstGenres>button>svg{
            display: none !important;
        }

    </style>




    <script>
        $.ajaxSetup({
            data: <?= \yii\helpers\Json::encode([
                \yii::$app->request->csrfParam => \yii::$app->request->csrfToken,
            ]) ?>
        });

        $('.mobile-menu-btn, .close-mobile-menu').click(function(){
            $('.mobile-menu').toggle();
            $('.sticky-nav').toggleClass('hidden');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/colorthief@2.3.2/dist/color-thief.min.js"></script>

    <script>
        //кольори зображення
        function getDominantColor(imagePath) {
            return new Promise(function(resolve, reject) {
                var image = new Image();
                image.crossOrigin = 'Anonymous';

                // Когда изображение загружено
                image.onload = function() {
                    var colorThief = new ColorThief();

                    // Извлечение основного цвета изображения
                    var dominantColor = colorThief.getColor(image);

                    // Проверка яркости основного цвета
                    var brightness = (dominantColor[0] + dominantColor[1] + dominantColor[2]) / 3;
                    if (brightness <= 20 || brightness >= 230) {
                        reject(new Error('Не удалось определить основной цвет'));
                        return;
                    }

                    // Преобразование RGB-значений в шестнадцатеричную форму
                    var hexColor = '#' + dominantColor.map(function(component) {
                        var hexComponent = component.toString(16);
                        return hexComponent.length === 1 ? '0' + hexComponent : hexComponent;
                    }).join('');

                    // Возврат результата
                    resolve(hexColor);
                };

                // Обработка ошибок при загрузке изображения
                image.onerror = function() {
                    reject(new Error('Не удалось загрузить изображение'));
                };

                // Загрузка изображения
                image.src = imagePath;
            });
        }
        function slader(){
            var theme = "#fff"
            if($("html").hasClass("dark")) theme = "#212529";
            var slides = $(".theslade");
            slides.each(function( index ) {
                var imagePath = $( this ).find(".img-slider").attr('src');
                var slide = $( this );
                getDominantColor(imagePath)
                    .then(function(color) {
                        //console.log('Основной цвет:', color);
                        slide.css("background-image","linear-gradient("+color+" ,  "+theme+" )");
                    })
                    .catch(function(error) {
                        console.error(error);
                    });

            });
        }
        slader();

        $(".design, .dot").click(function(){
            slader();
        });

    </script>




</body>
</html>
<?php $this->endPage() ?>

<style>



    .play-btn, .authoBlock{
        display: none;
    }


    .testImg{
        display: none;
    }



    @media(min-width:1000px){
        .MyFontMedium{
            padding-top: 7%;
        }
    }


    .mySwipNext, .mySwipPrev{
        /* top:94%; */
        color:white;
    }
    /* --swiper-theme-color:white; */
    .swiper-pagination-bullet{
        background:white;
    }

    .myBottom{
        padding-right:15px;
    }


    @media(max-width:450px) {
        .testImg {
            display: none !important;
        }
        .img-slider{
            width: 180px;
            height: 150px;
            display: block;
            margin: 0 auto;
            /* margin-top: 15%; */
            margin-bottom: 2%;
        }
        .absolute{
            position: relative;
        }

    }


    @media(max-width:465px){
        .w-full{
            margin-top: -10px;
            padding-top: 0px;
        }
        .font-medium{
            margin-top:10px;
        }
    }


    @media(min-width:408px) and (max-width:450px){
        .mySwiper{
            height:523px !important;
        }
    }


    @media(min-width:450px) and (max-width:771px) {
        .testImg {
            display: none !important;
        }
        /* .myTop img */
        .img-slider{
            /*         width: 100%;*/
            width: 230px;
            height: 80%;
            display: block;
            margin: 0 auto;
            margin:0px !important;
            /* margin-top: 15%; */
            /* margin-left: 4%; */
            margin-bottom: 2%;
        }
        .absolute{
            position: relative;
        }
        .myTop{
            height:auto;
        }

        .myBottom{
            /* height:120px; */
            /*overflow:hidden; */
            margin-top:-25%;
        }
        .myTagP{
            overflow: hidden;
            height:90px;
        }

        .mySwiper{
            height:600px !important;

        }
        .mySwipNext, .mySwipPrev{
            top:96%;
            color:white;
        }
    }





    @media(min-width:320px) and (max-width:450px) {
        .img-slider{
            height: auto;
        }

        .myTop{
            height:auto;
        }
        .myTagP{
            overflow: hidden;
        }

        .myBottom h2{
            height:80px;
            overflow: hidden;
        }
        .myTagP{
            height:40px !important;
            overflow:hidden;
            margin-bottom: 20px;
        }
        .swiper-pagination-horizontal{
            display: none;
        }


    }


    @media(min-width:320px) and (max-width:770px){
        .dot{
            margin-left: -70%;
        }
        .relative{
            display: flex;
        }
        .swiper-pagination{
            display: none;
        }
        .mySwiper{
            margin-top: 17%;
        }
        .MyFontMedium{
            text-align: center;
        }
        .myTagP{
            text-align: center;
        }
    }


    @media(min-width:449px ) and (max-width: 770px){
        .myTop img{
            margin: 0 auto !important;
        }
        .myBottom{
            margin-top: 5%;
        }
        .mySwipNext, .mySwipPrev{
            top:25% !important;
        }
        .mySwiper{
            margin-top: 10%;
        }
    }
    /*761-768*/

    @media(min-width: 761px) and (max-width:768px){
        .myTop{
            margin-left: 0px !important;
        }
        .myBottom {
            margin-top: 5% !important;
        }
    }

    @media(min-width:772px) and (max-width:1300px){
        .myTagP{
            height:152px !important;
            overflow:hidden;
            /* margin-bottom: 20px; */
        }
        .myBottom h2{
            height:45px;
            overflow: hidden;
        }
        .swiper-pagination{
            display: none;
        }
    }


    /* 1024 - 1026 */
    @media(min-width:772px) and (max-width:1025px) {
        .myFlex{
            /* background:red; */
            display: flex !important;
            flex-direction: column !important;

            /* flex-direction: row-reverse;  */
        }
        .myTop{
            /* order:2; */
            position: relative;
            z-index: 1;
            height:auto;
            padding-top:0px !important;
            margin-top: 7%;
        }
        .img-slider{
            height:auto;
            margin:0px;
        }
        .myBottom{
            /*background:black;*/
            opacity: 0.8;
            margin-top:-65.5%;
            position: relative;
            height:550px;
            /* order:1; */
            z-index: 2;
            padding-top:10%;
        }
        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }

    }

    @media(min-width: 1000px) and (max-width: 1026px){
        .myBottom h2 {
            height: 93px;
            overflow:visible;}

    }
    @media(min-width: 1023px) and (max-width: 1026px){
        .swiper-wrapper{
            margin-top: 40%;
        }
        .myTop{
            margin-top:  -26%;
        }
        .btn-white2{
            display: block;
        }
    }



    /* 1026 - 1200 */

    @media(min-width:1026px) and (max-width:1200px) {

        .myBottom h2{
            height:130px;
        }
        .myTop{
            margin-top: -69% !important;
            padding-left: 1% !important;
            padding-top: 0px;
        }


    }



    /* 1024 - 1171  */

    @media(min-width:1026px) and (max-width:1400px) {
        .myTop{
            margin-top:-69% !important;
            height:400px;
        }
        .myBottom{
            height:500px !important;
            margin-top: -10%;

        }
        .img-slider{
            height:400px;
            margin:0px;
        }
        .myFlex{
            padding-top:10%;
            height:400px;
            /*transition: 3s;*/
        }
        .myTagP{
            height:132px;
            overflow:hidden;
        }

    }

    @media(min-width: 1025px) and (max-width: 1150px){
        .myTop{
            margin-left: 53% !important;
        }
    }


    @media(min-width:1026px) and (max-width:1200px) {
        .myTop {
            padding-top: 0px;
            padding-left: 8% !important;
        }

    }


    @media(min-width:1201px) and (max-width:1400px)  {
        .myFlex{
            flex-direction:row !important;

        }
        .myTop{
            padding-top: 64%;
            padding-left:8% !important;
        }
        .img-slider{

            width:100%;
        }
        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }
        .myBottom{
            padding-left:1%;
        }
        .myBottom h2{
            height: 110px;
        }
        .MyFontMedium{
            margin-bottom: 5%;
        }


    }





    @media(min-width:1400px)  {
        .myFlex{
            flex-direction:row;

        }
        .myTop{
            padding-top:5%;
            padding-left:15% !important;
        }
        .img-slider{

            width:100%;
        }
        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }
        .myBottom{
            padding-left:1%;
        }
        .swiper-pagination{
            display: none;
        }
        .swiper-button-next, .swiper-button-prev{
            top: 65%;
        }
        .swiper-wrapper{
            margin-top: 5%;
        }
        .MyFontMedium{
            margin-bottom: 7%;
        }

    }




    @media(min-width:320px) and (max-width:1024px){
        .fa-layers{
            margin-top: 37%;
        }
    }




    @media(min-width:320px) and (max-width:460px){
        .rounded-full>svg{
            display: block !important;
        }


        .swiper-slide>.relative>.absolute{
            display: flex;
        }
    }


    @media(min-width: 1300px) and (max-width: 1400px){
        .swiper-pagination{
            display: none;
        }
    }



    .myFirstGenres>button>svg{
        display: none !important;
    }







</style>
<!-- 4089 - 4093 -->









<style>



    .play-btn, .authoBlock{
        display: none;
    }


    .testImg{
        display: none;
    }



    @media(min-width:1000px){
        .MyFontMedium{
            padding-top: 7%;
        }
    }


    .mySwipNext, .mySwipPrev{
        /* top:94%; */
        color:white;
    }
    /* --swiper-theme-color:white; */
    .swiper-pagination-bullet{
        background:white;
    }

    .myBottom{
        padding-right:15px;
    }


    @media(max-width:450px) {
        .testImg {
            display: none !important;
        }
        .img-slider{
            width: 180px;
            height: 150px;
            display: block;
            margin: 0 auto;
            /* margin-top: 15%; */
            margin-bottom: 2%;
        }
        .absolute{
            position: relative;
        }

    }


    @media(max-width:465px){
        .w-full{
            margin-top: -10px;
            padding-top: 0px;
        }
        .font-medium{
            margin-top:10px;
        }
    }


    @media(min-width:408px) and (max-width:450px){
        .mySwiper{
            height:523px !important;
        }
    }


    @media(min-width:450px) and (max-width:771px) {
        .testImg {
            display: none !important;
        }
        /* .myTop img */
        .img-slider{
            /*         width: 100%;*/
            width: 230px;
            height: 80%;
            display: block;
            margin: 0 auto;
            margin:0px !important;
            /* margin-top: 15%; */
            /* margin-left: 4%; */
            margin-bottom: 2%;
        }
        .absolute{
            position: relative;
        }
        .myTop{
            height:auto;
        }

        .myBottom{
            /* height:120px; */
            /*overflow:hidden; */
            margin-top:-25%;
        }
        .myTagP{
            overflow: hidden;
            height:90px;
        }

        .mySwiper{
            height:600px !important;

        }
        .mySwipNext, .mySwipPrev{
            top:96%;
            color:white;
        }
    }





    @media(min-width:320px) and (max-width:450px) {
        .img-slider{
            height: auto;
        }

        .myTop{
            height:auto;
        }
        .myTagP{
            overflow: hidden;
        }

        .myBottom h2{
            height:80px;
            overflow: hidden;
        }
        .myTagP{
            height:40px !important;
            overflow:hidden;
            margin-bottom: 20px;
        }
        .swiper-pagination-horizontal{
            display: none;
        }


    }


    @media(min-width:320px) and (max-width:770px){
        .dot{
            margin-left: -70%;
        }
        .relative{
            display: flex;
        }
        .swiper-pagination{
            display: none;
        }
        .mySwiper{
            margin-top: 17%;
        }
        .MyFontMedium{
            text-align: center;
        }
        .myTagP{
            text-align: center;
        }
    }


    @media(min-width:449px ) and (max-width: 770px){
        .myTop img{
            margin: 0 auto !important;
        }
        .myBottom{
            margin-top: 5%;
        }
        .mySwipNext, .mySwipPrev{
            top:25% !important;
        }
        .mySwiper{
            margin-top: 10%;
        }
    }
    /*761-768*/

    @media(min-width: 761px) and (max-width:768px){
        .myTop{
            margin-left: 0px !important;
        }
        .myBottom {
            margin-top: 5% !important;
        }
    }

    @media(min-width:772px) and (max-width:1300px){
        .myTagP{
            height:152px !important;
            overflow:hidden;
            /* margin-bottom: 20px; */
        }
        .myBottom h2{
            height:45px;
            overflow: hidden;
        }
        .swiper-pagination{
            display: none;
        }
    }


    /* 1024 - 1026 */
    @media(min-width:772px) and (max-width:1025px) {
        .myFlex{
            /* background:red; */
            display: flex !important;
            /*flex-direction: column !important;*/

            /* flex-direction: row-reverse;  */
        }
        .myTop{
            /* order:2; */
            position: relative;
            z-index: 1;
            height:auto;
            padding-top:0px !important;
            margin-top: 7%;
        }
        .img-slider{
            height:auto;
            margin:0px;
        }
        .myBottom{
            /*background:black;*/
            opacity: 0.8;
            margin-top:-65.5%;
            position: relative;
            height:550px;
            /* order:1; */
            z-index: 2;
            padding-top:10%;
        }
        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }

    }

    @media(min-width: 1000px) and (max-width: 1026px){
        .myBottom h2 {
            height: 93px;
            overflow:visible;}

    }
    @media(min-width: 1023px) and (max-width: 1026px){
        .swiper-wrapper{
            margin-top: 40%;
        }
        .myTop{
            margin-top:  -26%;
        }
        .btn-white2{
            display: block;
        }
    }



    /* 1026 - 1200 */

    @media(min-width:1026px) and (max-width:1200px) {

        .myBottom h2{
            height:130px;
        }
        .myTop{
            margin-top: -69% !important;
            padding-left: 1% !important;
            padding-top: 0px;
        }


    }



    /* 1024 - 1171  */

    @media(min-width:1026px) and (max-width:1400px) {
        .myTop{
            margin-top:-69% !important;
            height:400px;
        }
        .myBottom{
            height:500px !important;
            margin-top: -10%;

        }
        .img-slider{
            height:400px;
            margin:0px;
        }
        .myFlex{
            padding-top:10%;
            height:400px;
            /*transition: 3s;*/
        }
        .myTagP{
            height:132px;
            overflow:hidden;
        }

    }

    @media(min-width: 1025px) and (max-width: 1150px){
        .myTop{
            margin-left: 53% !important;
        }
    }


    @media(min-width:1026px) and (max-width:1200px) {
        .myTop {
            padding-top: 0px;
            padding-left: 8% !important;
        }

    }


    @media(min-width:1201px) and (max-width:1400px)  {
        .myFlex{
            flex-direction:row !important;
            transition: 1s;
        }
        .myTop{
            padding-top: 64%;
            padding-left:8% !important;
        }
        .img-slider{

            width:100%;
        }
        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }
        .myBottom{
            padding-left:1%;
        }
        .myBottom h2{
            height: 110px;
        }
        .MyFontMedium{
            margin-bottom: 5%;
        }


    }





    @media(min-width:1400px)  {
        .myFlex{
            /*flex-direction:row;*/

        }
        .myTop{
            padding-top:5%;
            padding-left:15% !important;
        }
        .img-slider{

            width:100%;
        }
        .mySwipNext, .mySwipPrev{
            /* top:94%; */
            color:white;
        }
        .myBottom{
            padding-left:1%;
        }
        .swiper-pagination{
            display: none;
        }
        .swiper-button-next, .swiper-button-prev{
            top: 65%;
        }
        .swiper-wrapper{
            margin-top: 5%;
        }
        .MyFontMedium{
            margin-bottom: 7%;
        }

    }


    @media(min-width:320px) and (max-width:1024px){
        .fa-layers{
            margin-top: 37%;
        }
    }

    @media(min-width:320px) and (max-width:460px){
        .rounded-full>svg{
            display: block !important;
        }


        .swiper-slide>.relative>.absolute{
            display: flex;
        }
    }


    @media(min-width: 1300px) and (max-width: 1400px){
        .swiper-pagination{
            display: none;
        }
    }



    .myFirstGenres>button>svg{
        display: none !important;
    }





    /*Inseert Bottom*/

@media(min-width: 320px) and (max-width: 769px){
    .myFlex{
        display: flex !important;
        flex-direction: column !important;
    }
}

    @media(min-width: 1020px) and (max-width: 1200px){
        .myFlex{
            display: flex !important;
            flex-direction: column !important;
        }
    }




/*   End insert Bottom */
</style>
<!-- 285     -->


<style>


    #p_prldr{
        position: fixed;
        left: 0;
        top: 0;
        right:0;
        bottom:0;
        background: black;
        z-index: 30;}

    .contpre small{font-size:25px;}

    .contpre{
        width: 250px;
        height: 100px;
        position: absolute;
        left: 50%;top: 48%;
        margin-left:-125px;
        margin-top:-75px;
        color:#fff;
        font-size:40px;
        letter-spacing:-2px;
        text-align:center;
        line-height:35px;}

    #p_prldr .svg_anm {
        position: absolute;
        width: 41px;
        height: 41px;
        background: url("https://gnatkovsky.com.ua/files/preload/oval.svg") center center no-repeat;
        background-size:41px;
        margin: -16px 0 0 -16px;}
</style>






<div id="p_prldr"><div class="contpre"><span class="svg_anm"></span><br><br><small>vintapes.com</small></div></div>
<link rel="stylesheet" href="css/main3.css">
<script>

   


    $(".overlay").addClass("show");


    $(window).on('load', function () {
        var $preloader = $('#p_prldr'),
            $svg_anm   = $preloader.find('.svg_anm');
        $svg_anm.fadeOut();
        $preloader.delay(300).fadeOut('slow');
    });



    // 27_12
   


    // 27_12
</script>




<!-- 27_12 init lib -->
<!-- Подключаем библиотеки и инициализируем слайдер -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js" defer></script>

<script defer>

document.addEventListener('DOMContentLoaded', function () {
  setTimeout(() => {
    var slider = tns({
        container: '.my-slider',
        items: 1,
        slideBy: 'page',
        autoplay: true,
        controls: false,
        prevButton: '.prev',
        nextButton: '.next',
        nav: false,
        autoplayButtonOutput: false,
        responsive: {
            640: {
                items: 1
            },
            768: {
                items: 1
            },
            1024: {
                items: 1
            }
        }
    });

    // Добавляем обработчики событий для кнопок внутри setTimeout
    document.querySelector('.prev').addEventListener('click', function() {
        console.log('Prev clicked');
        slider.goTo('prev');
    });

    document.querySelector('.next').addEventListener('click', function() {
        console.log('Next clicked');
        slider.goTo('next');
    });

    // Скрываем или показываем контейнер
    const sliderContainer = document.querySelector('.my-slider');
    sliderContainer.style.visibility = 'visible';
  }, 300); // Задержка в 300 миллисекунд
});











document.querySelectorAll('.my-slider .slide').forEach((slide, index) => {
  console.log(`Slide ${index + 1}:`, slide);
});

console.log(document.querySelector('.my-slider'));

</script>
<!-- 27_12 end init -->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6L820JXWXF"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-6L820JXWXF');
</script>

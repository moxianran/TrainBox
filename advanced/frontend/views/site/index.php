<div class="clearfix maincontent grayback" id="J_maincontent">

    <!-- 轮播区域 引入轮播模块代码 -->

    <!-- 轮播区域 -->

    <section id="section">
        <div class="bannerPane">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">


                        <li>
                            <div class="slider-caption">
                                <img src="img/index/slide05.jpg" alt="" />


                                <span >
								 <h1>Love</h1>
								 <p>
								 <br>
								 <br>
								 </p>

								<p>
									什么时候爱上一首曲子，什么时候恋上一张贴画，什么时候迷上一种习惯 <br>
									<br>一件件美好的事物，勾勒出您最真实的生命轨迹。
								</p>
								 <a href="/love">More Details</a>
								 </span>
                            </div>
                        </li>
                        <li>
                            <div class="slider-caption">
                                <img src="img/index/slide2.jpg" alt="" />

                                <span style="">

									    <h1>碎碎念</h1>
										<p>
											扯淡、吐槽、心情、树洞……想说啥就说啥！... <br>
											<br>NorthPark就是你的树洞。
											volutpat.
										</p>
										<a href="/note/list">More Details</a>

									    </span>
                            </div>
                        <li>
                            <div class="slider-caption">
                                <img src="img/index/slide3.jpg" alt="" />

                                <span >

										<h1>情圣日记</h1>
										<p>
											Maecenas fermentum est ut elementum vulputate. Ut vel consequat
											urna. Ut aliquet <br>
											<br>ornare massa, quis dapibus quam condimentum id.
										</p>
										<a href="/romeo">Get Ready</a>

										 </span>
                            </div>
                        <li>
                            <div class="slider-caption">
                                <img src="img/index/slide4.jpg" alt="" />

                                <span >

											 <h1>热映电影</h1>
												<p>
													最新热映电影、BT、云盘、火热资源
													<br>
													<br>每周更新
												</p>
												<a href="/movies">Get Ready</a>

											 </span>
                            </div>


                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </section>



    <!-- ================================================================================== -->
    <div class="container">
        <div class="clearfix center logbox gray-text">
            <h2>
                最爱
            </h2>
        </div>
        <hr class="smallhr">
        <div class="row sloganbox">
            <div class="col-xs-8 col-xs-offset-2 center">

                <p>什么时候爱上一首曲子，什么时候恋上一张贴画，什么时候迷上一种习惯...</p>
                <p>一件件美好的事物，勾勒出您最真实的生命轨迹。</p>
                <a href="/signup" class="btn btn-hero btn-lg radius-2 margin-t10 no-decoration">Join NorthPark ››</a>
            </div>
        </div>
    </div>

    <!-- 最爱 模块代码-->
    <div class="container grayback" id="J_container_love">


        <div class="row center margin20">
            <a href="/love" class="btn btn-gray btn-lg radius-2 margin-t10 no-decoration">发现更多 ››</a>
        </div>

        <!-- ================================================================================== -->

    </div>

    <div class="container">
        <div class="clearfix center logbox gray-text">
            <h2>
                碎碎念
            </h2>
        </div>

        <hr class="smallhr">

        <div class="row sloganbox">
            <div class="col-xs-8 col-xs-offset-2 center">

                <p>扯淡、吐槽、心情、树洞……想说啥就说啥！...</p>
                <p>NorthPark就是你的树洞。</p>
            </div>
        </div>
    </div>
    <!-- 碎碎念 模块代码-->
    <div class="container grayback" id="J_container_note">

    </div>


    <!-- ================================================================================== -->

    <div class="container">
        <div class="clearfix center logbox gray-text">
            <h2>
                情圣日记
            </h2>
        </div>
        <hr class="smallhr">

        <div class="row sloganbox">
            <div class="col-xs-8 col-xs-offset-2 center" style="font-family: 'Dorsa-Regular';">

                <p>Maecenas fermentum est ut elementum vulputate. Ut vel consequat
                    urna. Ut aliquet
                </p>
                <p>ornare massa, quis dapibus quam condimentum id.</p>
            </div>
        </div>

    </div>

    <!-- 情圣日记 模块代码-->
    <div class="container grayback" id="J_container_romeo">

    </div>



    <!-- ================================================================================== -->

    <div class="container">
        <div class="clearfix center logbox gray-text">
            <h2>
                热映电影
            </h2>
        </div>
        <hr class="smallhr">

        <div class="row sloganbox">
            <div class="col-xs-8 col-xs-offset-2 center" style="font-family: 'Dorsa-Regular';">

                <p>最新热映电影、BT、云盘、火热资源
                </p>
                <p>每周更新.</p>
            </div>
        </div>

    </div>

    <!-- 电影 模块代码-->
    <div class="container grayback" id="J_container_movies">

    </div>

    <!-- ================================================================================== -->

</div>

<!--bruce music player loading -->
<!-- <div id="QPlayer">
		<div id="pContent">
			<div id="player">
				<span class="cover"></span>
				<div class="ctrl">
					<div class="musicTag marquee">
						<strong>Title</strong> <span> - </span> <span class="artist">Artist</span>
					</div>
					<div class="clearfix progress1">
						<div class="timer left">0:00</div>
						<div class="contr">
							<div class="rewind icon"></div>
							<div class="playback icon"></div>
							<div class="fastforward icon"></div>
						</div>
						<div class="right">
							<div class="liebiao icon"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="ssBtn">
				<div class="adf"></div>
			</div>
		</div>
		<ol id="playlist"></ol>
</div> -->

<?php
use frontend\assets\AppAsset;
AppAsset::addCss($this,'@web/css/font-awesome.css');
AppAsset::addCss($this,'@web/css/flexslider.css');
AppAsset::addCss($this,'@web/css/jquery.mmenu.all.css');

AppAsset::addScript($this,'@web/js/plugins.js');
AppAsset::addScript($this,'@web/js/main.js');
AppAsset::addScript($this,'@web/js/jquery.mmenu.min.all.js');
AppAsset::addScript($this,'@web/js/jquery.flexslider.js');
AppAsset::addScript($this,'@web/js/o-script.js');
AppAsset::addScript($this,'@web/js/jquery.marquee.min.js');
?>


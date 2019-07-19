
<!--<html>-->



<!--<body>-->

<?php 
	require_once 'crud/conexion.php';
	include_once 'includes/menu.php' ?>

    <!-- Slider -->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <!-- SLIDE 1 -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                    <!-- MAIN IMAGE -->
                    <img src="img/slides_bg/dummy.png" alt="slidebg1" data-lazyload="img/slides_bg/volcanmas.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption white_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Lava Tour in Volcan Masaya
                    </div>
                    <!-- LAYER NR. 2 -->
                   <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div style="color:#000000; font-size:16px; text-transform:uppercase">
                            Lava Tour / Tour Tickets / Tour Guides</div>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href="lava_tour" class="button_intro">View tour</a> 
                    </div>
                </li>
                 <!-- SLIDE 2 -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                    <!-- MAIN IMAGE -->
                    <img src="img/slides_bg/dummy.png" alt="slidebg1" data-lazyload="img/slides_bg/mombacho.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption white_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Volcan Mombacho Tour
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div style="color:#000000; font-size:16px; text-transform:uppercase">
                            Diferents Tour / Tour Tickets / Tour Guides</div>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href="mombacho" class="button_intro">View tour</a> 
                    </div>
                </li>
                
                <!-- SLIDE 3 -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                    <!-- MAIN IMAGE -->
                    <img src="img/slides_bg/dummy.png" alt="slidebg1" data-lazyload="img/slides_bg/apoyo.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption white_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Laguna de Apoyo Tour
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div style="color:#000000; font-size:16px; text-transform:uppercase">
                            We offer a variety of services and options</div>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href="laguna_apoyo" class="button_intro">View tour</a>
                    </div>
                </li>
                
                <!-- SLIDE 4 -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                    <!-- MAIN IMAGE -->
                    <img src="img/slides_bg/dummy.png" alt="slidebg1" data-lazyload="img/slides_bg/leon.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption black_heavy_40 customin customout text-center text-uppercase" data-x="center" data-y="center" data-hoffset="0" data-voffset="-20" data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="1000" data-start="1700" data-easing="Back.easeInOut" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Leon Tours
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0 text-center" data-x="center" data-y="center" data-hoffset="0" data-voffset="15" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
                        <div style="color:#000000; font-size:16px; text-transform:uppercase">
                            Visit cathedral with a dedicated tour guide</div>
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="center" data-hoffset="0" data-voffset="70" data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="500" data-start="2900" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next" style="z-index: 12;"><a href="leon" class="button_intro">View tour</a> 
                    </div>
                </li>


            </ul>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
    <!-- End Slider -->

    <div class="container margin_60">
    
        <div class="main_title">
            <h2>Nicaragua <span>Top</span> Tours</h2>
            <p>Excellent guide and safe transportation services!”.</p>
        </div>
        
        <div class="row">
         <?php $dest = $MySQLiconn->query("select vd.*, cat.descripcion as categoria,cat.tag
										from (
										select id_depto, max(id_destino) as id_destino
										from v_destinos
										group by id_depto ) as gd
										inner join v_destinos vd on vd.id_depto=gd.id_depto and 									vd.id_destino =gd.id_destino
										inner join (SELECT DISTINCT cat.id_categoria, cat.descripcion,ma.id_destino,t.descripcion as tag
										FROM categoria cat
										inner join tags t on cat.id_tag = t.id_tag
										INNER JOIN actividad a ON cat.id_categoria = a.id_categoria
										INNER JOIN maestro_act ma ON a.id_actividad = ma.id_actividad ) as cat	on cat.id_destino = vd.id_destino
										where vd.id_estatus = 1
										order by vd.id_destino
										limit 16");
		     while ($lisd = mysqli_fetch_array($dest))
			 {
			?>
            <div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
                <div class="tour_container">
                	<div class="ribbon_3 popular"><span>Top rated</span></div>
                    <div class="img_container">
                        <a href="pagina_web/tour?id_dest=<?php echo $lisd['id_destino']; ?> ">
                        <img src="<?php echo $lisd['imagen']?>" class="img-responsive" alt="image">
                        <div class="short_info">
                            <i class="<?php echo $lisd['tag']?>"></i><?php echo $lisd['categoria']?> <span class="price"><sup>$</sup><?php echo $lisd['precio']?></span>
                        </div>
                        </a>
                    </div>
                    <div class="tour_title">
                        <h3><strong><?php echo $lisd['nombre_dest']?></strong> tour</h3>
                        <div class="rating">
                            <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><small>(100)</small>
                        </div><!-- end rating -->
                    </div>
                </div><!-- End box tour -->
            </div>
            <?php } ?>
          
            
        </div><!-- End row -->
        <p class="text-center add_bottom_30">
            <a href="pagina_web/all_tours_list" class="btn_1 medium"><i class="icon-eye-7"></i>View all tours  </a>
        </p>
<!-- End row -->    </div><!-- End container -->
    <!-- End white_bg -->
    
    <section class="promo_full">
    <div class="promo_full_wp magnific">
        <div>
            <h3>LEON CITY</h3>
            <p>
                The city of Leon houses some of the largest and diverse historical heritages of Nicaragua, the monumental heritage of León is rich.
            </p>
            <a href="https://www.youtube.com/watch?v=AsWalNVaRA8" class="video"><i class="icon-play-circled2-1"></i></a>
        </div>
    </div>
    </section><!-- End section -->
    
    <div class="container margin_60">
    
        <div class="main_title">
            <h2>Some <span>good</span> reasons</h2>
            <p>
                Your comfort and your security are essential to us!.
            </p>
        </div>
        
        <div class="row">
        
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.2s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-41"></i>
                    <h3><span>+20</span> Premium tours</h3>
                    <p>
                         
						<!--Agregar texto si es necesario -->
                    </p>
                    <a href="about.html" class="btn_1 outline">Read more</a>
                </div>
            </div>
            
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.4s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-30"></i>
                    <h3><span>+1000</span> Customers</h3>
                    <p>
                         <!--Agregar texto si es necesario -->
                    </p>
                    <a href="https://www.tripadvisor.com.mx/Attraction_Review-g580113-d2197390-Reviews-Eleda_Transporte-Granada_Granada_Department.html" class="btn_1 outline" target="_blank">Read more</a>
                </div>
            </div>
            
            <div class="col-md-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="feature_home">
                    <i class="icon_set_1_icon-57"></i>
                    <h3><span>H24 </span> Support</h3>
                    <p>
                         <!--Agregar texto si es necesario -->
                    </p>
                    <a href="about.html" class="btn_1 outline">Read more</a>
                </div>
            </div>
            
        </div><!--End row --><!-- End row -->
        
    </div><!-- End container -->
	 
    <?php include_once 'includes/footer.php' ?>

<div id="toTop"></div><!-- Back to top button -->

    <!-- Common scripts -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/common_scripts_min.js"></script>
    <script src="js/functions.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/revolution_func.js"></script>
	<script src="dist/js/adminlte.min.js"></script>
    
    <script src="/xtravagancia/js/theia-sticky-sidebar.js"></script>
	<script>
		jQuery('#sidebar').theiaStickySidebar({
			additionalMarginTop: 80
		});
	</script>


<script type="text/javascript">/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
</body>

</html>
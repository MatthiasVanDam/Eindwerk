<?php include('includes/header.php')?>
<?php include('includes/content-top.php')?>


<section class="page-section mt-5" id="contact">
    <div class="container">

        <div data-aos="fade-right" data-aos-duration="1500" class="row">
            <div class="col-xs-12 col-md-6">
                <h3 class="section-heading text-uppercase text-center">Contact</h3>
                <hr class="bg-success mb-5">
            </div>
        </div>

       <div class="row">

            <div class="col-xs-12 col-md-6 mb-5 d-flex align-items-center">
                <div data-aos="fade-right" data-aos-duration="1500" class="sidePageIntro-content">
                    <p class="text-secondary text-justify p-3">Heeft u plannen voor een nieuwe tuin? Of zoekt u iemand om uw tuin een opknapbeurt te geven? 
                    Contacteer ons! Dan begeleiden wij u op een persoonlijke manier doorheen het volledige traject.
                    </p>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 d-flex align-items-center justify-content-center">
                <div data-aos="fade-left" data-aos-duration="1500" class="sidePageIntro-content contactInfo">

                        <div class="contact-adress d-flex">
                            <div><i class="fas fa-map-marker-alt fa-lg pr-3 display-5"></i> </div>
                            <div> 
                            <h5 class="text-uppercase">Buyse.</h5>
                            <p class="text-secondary">Jordy Buyse</p>
                            <p class="text-secondary">Teststraat xx</p>
                            <p class="text-secondary">1851 Humbeek</p>
                            </div>                         
                        </div>

                        <div class="contact-telefoon d-flex my-2">
                            <div><i class="fas fa-phone-alt fa-lg pr-3"></i></div>
                            <div><p> +32 0479 xx xx xx</p></div>
                        </div>

                        <div class="contact-email d-flex">
                            <div><i class="fas fa-envelope fa-lg pr-3"></i></div>
                            <div> <p> mail@buyse.be</p></div>
                        </div>
                       
                </div>
            </div>

        </div>
    </div>
    
</section>

<section">
   <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2512.8506291231784!2d4.400541915750054!3d50.96346587954939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3e8677ba6c03d%3A0x3753f709a0d5cfdd!2sOostvaartdijk%2065%2C%201850%20Grimbergen!5e0!3m2!1snl!2sbe!4v1598005574034!5m2!1snl!2sbe" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
   </div>

   
</section>

<!--VRAGEN-->
<section class="page-section " id="vragen" >
    <div class="container ">
        <div class="row ">

            <div class="col-xs-12 col-md-6">
                <div data-aos="fade-right" data-aos-duration="1500" class="faderight">
                    <h3 class="section-heading text-uppercase text-center">Vragen?</h3>
                    <hr class="bg-success mb-5">

                    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                        <div class="form-group">
                            <input type="text" class="form-control from-control-lg " name="firstname" placeholder="Voornaam" id="firstName">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small></small>
                        </div>

                        <div class="form-group">
                            <input type="text " class="form-control from-control-lg " name="lastname" placeholder="Achternaam" id="lastName">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small></small>
                        </div>

                        <div class="form-group">
                            <input type="email " class="form-control from-control-lg " name="mail" placeholder="Email" id="mail">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small></small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control from-control-lg " name="phone" placeholder="Mobiel" id="phone">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small></small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control from-control-lg " name="subject" placeholder="onderwerp" id="subject">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small></small>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control from-control-lg " name="message" placeholder="Uw vraag" id="message"></textarea>
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small></small>
                        </div>
                        
                        <div class="text-center"> 
                            <?php 
                                $success= "";                       
                                if(isset($_GET['success'])){
                                    $success = "<p class='text-success'>Bericht verzonden, bedankt voor ons te contacteren!</p>";
                                }
                                echo $success;
                            ?>
                        </div>

                        <div class="form-group mt-5 text-center">
            
                            <button class="btn btn-lg btn-success">Verstuur</button>
                            
                        </div>

                    </form>

                </div>
            </div>
            

            <!--CONTACTUREN-->
            
            <div class="col-xs-12 col-md-6 order-first order-md-2 mb-5">
                <div data-aos="fade-left" data-aos-duration="1500" class="fadeleft">
                    
                    <h3 class="section-heading text-uppercase text-center">Openingsuren</h3>
                    <hr class="bg-success mb-5">
                    <div class="row ">

                        <ul class="list-unstyled mx-auto col-8 openinghours">
                        
                            <li>Maandag <span class="float-right ">9:00-18:00</span></li>
                            <li>Dinsdag <span class="float-right ">9:00-18:00</span></li>
                            <li>Woensdag <span class="float-right ">9:00-18:00</span></li>
                            <li>Donderdag <span class="float-right ">9:00-18:00</span></li>
                            <li>Vrijdag <span class="float-right ">9:00-18:00</span></li>
                            <li>Zaterdag <span class="float-right ">9:00-18:00</span></li>
                            <li>Zondag<span class="float-right ">Gesloten</span></li>
                            <li>Feestdagen <span class="float-right ">Gesloten</span></li>
                        </ul>

                    </div>
                </div>
            </div>
            

        </div>
    </div>
</section>





<?php include('includes/footer.php')?>
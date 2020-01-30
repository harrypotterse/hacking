 <section class="contact" id="contact">
            <div class="container">
                <div class="main-title">
                    <h2>تواصل معي</h2>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contact-boxes">
                            <div class="contact-box">
                                <div class="title-box">
                                    <h4>العنوان
                                        <span class="icon-box"><i class="fa fa-map-marker"></i></span>
                                    </h4>
                                </div>
                                <div class="content-box">
                                    <p><?php echo $contact->statement1; ?></p>
                                    <p><?php echo $contact->statement2; ?></p>
                                </div>
                            </div>
                            <div class="contact-box">
                                <div class="title-box">
                                    <h4>البريد الالكتروني
                                        <span class="icon-box"><i class="fa fa-envelope"></i></span>
                                    </h4>
                                </div>
                                <div class="content-box">
                                    <p><?php echo $contact->statement3; ?></p>
                                    <p><?php echo $contact->statement4; ?></p>
                                </div>
                            </div>
                            <div class="contact-box">
                                <div class="title-box">
                                    <h4>Phone
                                        <span class="icon-box"><i class="fa fa-phone"></i></span>
                                    </h4>
                                </div>
                                <div class="content-box">
                                    <p><?php echo $contact->statement5; ?></p>
                                    <p><?php echo $contact->statement6; ?></p>
                                </div>
                            </div>
                            <div class="contact-box">
                                <div class="title-box">
                                    <h4>الموقع
                                        <span class="icon-box"><i class="fa fa-globe"></i></span>
                                    </h4>
                                </div>
                                <div class="content-box">
                                    <p><?php echo $contact->statement7; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <form class="contact-form" action="Forms/contact.php" method="post" id="uploadImage">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="Name" required value="" onkeyup="this.setAttribute('value', this.value);">
                                <label for="name">الاسم</label>
                                <span class="input-border"></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="Email" required value="" onkeyup="this.setAttribute('value', this.value);">
                                <label for="email">الايميل</label>
                                <span class="input-border"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="Subject" required value="" onkeyup="this.setAttribute('value', this.value);">
                                <label for="subject">الموضوع</label>
                                <span class="input-border"></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" name="message" required data-value="" onkeyup="this.setAttribute('data-value', this.value);"></textarea>
                                <label for="message">الرسالة</label>
                                <span class="input-border"></span>
                            </div>
                            <!-- Button Send Message  -->
                            <button class="contact-btn main-btn btn btn-block" type="submit" name="send">ارسال الرساله</button>
                        </form> 
                        <div id="targetLayer">     
                        </div>
                    </div>
                </div>
            </div>
        </section>
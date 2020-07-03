@include('header')
    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">

                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Your current information</h3>
                            <div class="review_item">
                                <div class="media">
                                  <div class="d-flex">
                                    <img class="profile_picture" src="https://scontent.fdac21-1.fna.fbcdn.net/v/t1.0-9/64598049_919459518438703_3989188770103558144_n.jpg?_nc_cat=111&_nc_sid=8bfeb9&_nc_eui2=AeGMSpK06HDKXjEvEOjQ_L1vCqVRRKFFKAoKpVFEoUUoCvIifV5ebfXAffy3O9HtlgCOJNP3seHRmRlEjLNNNCrz&_nc_oc=AQkmK5O0l936j9nImaMZmC5MTB-ikO199-vOJ7MlzsvDsrPZ8AXaggqViNcFU9vfbC8&_nc_ht=scontent.fdac21-1.fna&oh=531e349fd384cee471e443d5d74eaf06&oe=5EEFFE36" alt=""/>
                                  </div>
                                  <div class="media-body">
                                    <a class="edit_btn" href="#">Upload Photo</a>
                                  </div>
                                </div>
                            </div>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="mzabyn"
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="Mehbuba Zabyn"
                                        placeholder="Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name" value="zabyn@co-well.jp"
                                        placeholder="E-mail">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="tel" class="form-control" id="name" name="name" value="+8801722130860"
                                        placeholder="Phone"  pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <div class="radion_btn">
                                      <input type="radio" id="f-option5" name="selector" />
                                      <label for="f-option5">Male</label>
                                      <div class="check"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="selector" checked />
                                        <label for="f-option6">Female</label>
                                        <div class="check"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="12345678"
                                        placeholder="Password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        UPDATE
                                    </button>
                                </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        RESET
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

@include('footer')

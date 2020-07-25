@include('header')
<!--================login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Sign up</h3>
                        <form class="row contact_form" action="/customers" method="post" novalidate="novalidate">
                            {{ csrf_field() }}
                            @if($providerUser)
                                <input type="hidden" name="avatar" value="{{ old('avatar',$providerUser->avatar) }}">
                                <input type="hidden" name="provider_user_id"
                                       value="{{ old('provider_user_id',$providerUser->id) }}">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="first_name"
                                           value="{{ old('first_name',$providerUser->first_name)}}"
                                           placeholder="First Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="last_name"
                                           value="{{ old('last_name',$providerUser->last_name)}}"
                                           placeholder="Last Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="email"
                                           value="{{ old('email',$providerUser->email) }}"
                                           placeholder="E-mail">
                                </div>
                            @else
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="first_name"
                                           value="{{ old('first_name')}}"
                                           placeholder="First Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="last_name"
                                           value="{{ old('last_name')}}"
                                           placeholder="Last Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="email"
                                           value="{{ old('email') }}"
                                           placeholder="E-mail">
                                </div>
                            @endif

                            <div class="col-md-12 form-group p_star">
                                <input type="tel" class="form-control" id="name" name="phone" value="{{ old('phone') }}"
                                       placeholder="Phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="gender" value="male" checked/>
                                    <label for="f-option5">Male</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="gender" value="female"/>
                                    <label for="f-option6">Female</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                       placeholder="Password">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" value=""
                                       placeholder="Re-enter Password">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn_3">
                                    SIGN UP
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Already a member?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="/customers" class="btn_3">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

@include('footer')

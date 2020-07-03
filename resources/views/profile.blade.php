@include('header')
<style>
    .buttons_padding_top{
        padding-top: 40px;
    }
    .profile_buttons{
        width: 100%;
    }
</style>
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="review_item">
                    <div class="media">
                      <div class="d-flex">
                        <img class="profile_picture" src="https://scontent.fdac21-1.fna.fbcdn.net/v/t1.0-9/64598049_919459518438703_3989188770103558144_n.jpg?_nc_cat=111&_nc_sid=8bfeb9&_nc_eui2=AeGMSpK06HDKXjEvEOjQ_L1vCqVRRKFFKAoKpVFEoUUoCvIifV5ebfXAffy3O9HtlgCOJNP3seHRmRlEjLNNNCrz&_nc_oc=AQkmK5O0l936j9nImaMZmC5MTB-ikO199-vOJ7MlzsvDsrPZ8AXaggqViNcFU9vfbC8&_nc_ht=scontent.fdac21-1.fna&oh=531e349fd384cee471e443d5d74eaf06&oe=5EEFFE36" alt=""/>
                      </div>
                      <div class="media-body">
                        <h3>Mehbuba Zabyn</h3>
                        <h4>zabyn@co-well.jp</h4>
                        <h4>+8801722130860</h4>
                        <a class="edit_btn" href="edit">Edit</a>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 buttons_padding_top">
                <a href="#" class="genric-btn primary radius profile_buttons" >Your Blogs</a>
            </div>
            <div class="col-lg-4 col-md-4 buttons_padding_top">
                <a href="#" class="genric-btn primary radius profile_buttons">Your Reviews</a>
            </div>
            <div class="col-lg-4 col-md-4 buttons_padding_top">
                <a href="#" class="genric-btn primary radius profile_buttons">Your Orders</a>
            </div>
        </div>
    </div>
</section>
@include('footer')

@extends('layouts/contentGuide')

@section('title', 'test')


@section('content')


<div class="row my-4 ">
    {{-- <div class="col-lg-4 col-md-4 col-sm-12">
            <h4>Введите свое имя и адрес:</h4>
            <div class="mb-3">

                <input class="form-control" type="text" id="firstName" name="firstName" placeholder="Ваше имя" autofocus="">
            </div>
            <div class="mb-3">

                <input class="form-control" type="text" id="state" name="state" placeholder="Введите адрес">
            </div>
            <div class="mb-3">

                <select id="country" class="select2 form-select">
                    <option value="">Выбрать</option>
                    <option value="Australia">Ахалский велаят</option>
                    <option value="Bangladesh">Лепабский велаят</option>
                    <option value="Belarus">Балканский велая</option>
                    <option value="Brazil">Мары велаят</option>
                    <option value="Canada">Дашогузский велаят</option>

                </select>
            </div>
            <h4>Ваша контактная информация?</h4>
            <div class="mb-3">

                <input type="text" class="form-control" id="email" name="email-username" placeholder="Email"
                    autofocus="">
            </div>
            <div class="mb-3">

                <div class="input-group input-group-merge">
                    <span class="input-group-text">TKM (+993)</span>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="65 212121">
                </div>
            </div>
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <p class="thin-text ">Я прочитал и даю согласие на обработку моей информации в соответсвии с <a
                        href="#"><span class="text-decoration-underline">Политикой конфиденциальности</span></a> и<a
                        href="#"><span class="text-decoration-underline"> Условиями
                            использования</span></a> Aimai</p>
            </div>
            <div class="mb-3">
                <button class="btn black-btn d-grid mx-auto" type="submit">Продолжить</button>
            </div>
        </div> --}}
    <div class="card col-7">
        <div class="card-body p-0">
            <ol class="activity-checkout mb-0 px-4 mt-3">
                <li class="checkout-item">
                    <div class="avatar checkout-icon p-1">
                        <div class="avatar-title rounded-circle bg-primary"> <i class="bx bxs-receipt text-white font-size-20"></i></div>
                    </div>
                    <div class="feed-item-list">
                        <div>
                            <h5 class="font-size-16 mb-1">Платежная информация</h5>
                            <p class="text-muted text-truncate mb-4">Sed ut perspiciatis unde omnis iste</p>
                            <div class="mb-3">
                                <form>
                                    <div>
                                    <div class="col-lg-12"><div>Есть ли у Вас аккаунт?</div>
                                                <input type="radio" id="have-account" name="have-account" value="yes">
                                                <label for="have-account">Да</label>
                                                <input type="radio" id="have-account" name="have-account" value="no">
                                                <label for="have-account">Нет</label>
                                            </div>
                                        <div class="row" id="contactInfo">
                                           
                                            <div class="col-lg-6">
                                                <div class="mb-3"> <label class="form-label" for="billing-name">Имя</label> <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-4">
                                                <div class="mb-3"> <label class="form-label" for="billing-email-address">Email</label> <input type="email" class="form-control" id="billing-email-address" placeholder="Enter email"></div>
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="mb-3"> <label class="form-label" for="billing-phone">Номер телефона</label> <input type="text" class="form-control" id="billing-phone" placeholder="Enter Phone no."></div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label class="form-country" for="country">Велаят</label>
                                            <select id="country" class="select2 form-select">
                                                <option value="">Выбрать</option>
                                                <option value="Australia">Ахалский велаят</option>
                                                <option value="Bangladesh">Лепабский велаят</option>
                                                <option value="Belarus">Балканский велая</option>
                                                <option value="Brazil">Мары велаят</option>
                                                <option value="Canada">Дашогузский велаят</option>

                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label class="form-label" for="billing-phone">Адрес</label>
                                            <input class="form-control" type="text" id="state" name="state" placeholder="Введите адрес">
                                        </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- <li class="checkout-item">
                    <div class="avatar checkout-icon p-1">
                        <div class="avatar-title rounded-circle bg-primary"> <i class="bx bxs-truck text-white font-size-20"></i></div>
                    </div>
                    <div class="feed-item-list">
                        <div>
                            <h5 class="font-size-16 mb-1">Информация о доставке</h5>
                            <p class="text-muted text-truncate mb-4">Neque porro quisquam est</p>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div data-bs-toggle="collapse"> <label class="card-radio-label mb-0"> <input type="radio" name="address" id="info-address1" class="card-radio-input" checked="">
                                                <div class="card-radio text-truncate p-3"> <span class="fs-14 mb-4 d-block">Address 1</span> <span class="fs-14 mb-2 d-block">Bradley McMillian</span> <span class="text-muted fw-normal text-wrap mb-1 d-block">109
                                                        Clarksburg Park Road Show Low, AZ 85901</span> <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                </div>
                                            </label>
                                            <div class="edit-btn bg-light  rounded"> <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit"> <i class="bx bx-pencil font-size-16"></i> </a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div> <label class="card-radio-label mb-0"> <input type="radio" name="address" id="info-address2" class="card-radio-input">
                                                <div class="card-radio text-truncate p-3"> <span class="fs-14 mb-4 d-block">Address 2</span> <span class="fs-14 mb-2 d-block">Bradley McMillian</span> <span class="text-muted fw-normal text-wrap mb-1 d-block">109
                                                        Clarksburg Park Road Show Low, AZ 85901</span> <span class="text-muted fw-normal d-block">Mo. 012-345-6789</span>
                                                </div>
                                            </label>
                                            <div class="edit-btn bg-light  rounded"> <a href="#" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit"> <i class="bx bx-pencil font-size-16"></i> </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> -->
            </ol>
        </div>
    </div>
    <div class="col-xl-5">
        <div class="card checkout-order-summary">
            <div class="card-body">
                <div class="p-3 bg-light mb-3">
                    <h5 class="mb-0">Итоговая сумма <span class="float-end ms-2">#MN0124</span></h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered mb-0 table-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0" style="width: 110px;" scope="col">Product</th>
                                <th class="border-top-0" scope="col">Product Desc</th>
                                <th class="border-top-0" scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><img src="https://www.bootdey.com/image/280x280/FF00FF/000000" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                <td>
                                    <h5 class="text-truncate"><a href="#" class="text-dark">Waterproof Mobile
                                            Phone</a></h5>
                                    {{-- <p class="text-muted mb-0"> <i class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star-half text-warning"></i></p> --}}
                                    <p class="text-muted mb-0 mt-1">$ 260 x 2</p>
                                </td>
                                <td>$ 520</td>
                            </tr>
                            <tr>
                                <th scope="row"><img src="https://www.bootdey.com/image/280x280/FF00FF/000000" alt="product-img" title="product-img" class="avatar-lg rounded"></th>
                                <td>
                                    <h5 class="text-truncate"><a href="#" class="text-dark">Smartphone Dual
                                            Camera</a></h5>
                                    {{-- <p class="text-muted mb-0"> <i class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star text-warning"></i> <i
                                                class="bx bxs-star text-warning"></i></p> --}}
                                    <p class="text-muted mb-0 mt-1">$ 260 x 1</p>
                                </td>
                                <td>$ 260</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p class="m-0">Sub Total :</p>
                                </td>
                                <td> $ 780</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p class="m-0">Discount :</p>
                                </td>
                                <td> - $ 78</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <p class="m-0">Shipping Charge :</p>
                                </td>
                                <td> $ 25</td>
                            </tr>
                            <tr class="bg-light">
                                <td colspan="2">
                                    <p class="bold m-0">Total:</p>
                                </td>
                                <td class="bold"> $ 745.2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    $(document).ready(function() {
  $("#have-account").change(function() {
    if ($(this).val() == "no") {
      $("#contactInfo").hide();
    } else {
      $("#contactInfo").show();
    }
  });
});
</script>

@endsection
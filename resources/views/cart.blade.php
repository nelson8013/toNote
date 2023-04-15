
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <title>Cart</title>
</head>
<body>


    <section>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
      <div class="mx-auto max-w-3xl">
        <header class="text-center">
          <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Your Cart</h1>
        </header>

        <div class="mt-8">
          <ul class="space-y-4">
            @forelse ($cart as $product)
              <li class="flex items-center gap-4">
                <img
                  src="{{ $product->product->image }}"
                  alt=""
                  class="h-16 w-16 rounded object-cover"
                />

                <div>
                  <h3 class="text-sm text-gray-900 font-bold" data-user="1" data-product="{{$product->id}}">{{ $product->product->name }}</h3>

                  <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                    <div>
                      <dt class="inline">price:</dt>
                      <dd class="inline" data-price="{{ $product->product->price }}">₦ {{ number_format($product->product->price)}}</dd>
                    </div>

                    <div>
                      <dt class="inline">Sub Total:</dt>
                      <dd class="inline" data-total="{{ $product->total }}">₦ {{ number_format($product->total) }}</dd>
                    </div>
                  </dl>
                </div>

                <div class="flex flex-1 items-center justify-end gap-2">
                  <form>
                    <label for="Line1Qty" class="sr-only"> Quantity </label>
                    <input
                      type="number"
                      name="quantity"
                      min="1"
                      data-quantity="{{$product->quantity}}"
                      value="{{ $product->quantity }}"
                      id="Line1Qty"
                      class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none"
                    />
                  </form>

                  <button class="text-gray-600 transition hover:text-red-600">
                    <span class="sr-only">Edit Item</span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0,0,256,256" width="19px" height="19px" fill-rule="nonzero"><g fill-opacity="0.47059" fill="#000000" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M36,5.00977c-1.7947,0 -3.58921,0.68037 -4.94922,2.04102l-22.13477,22.13281c-0.41998,0.41998 -0.72756,0.94226 -0.89062,1.51563l-2.9668,10.38867c-0.14899,0.52347 -0.00278,1.08658 0.38208,1.47144c0.38485,0.38485 0.94796,0.53107 1.47144,0.38208l10.39062,-2.9668c0.00065,-0.00065 0.0013,-0.0013 0.00195,-0.00195c0.56952,-0.16372 1.09052,-0.46748 1.51172,-0.88867l22.13281,-22.13476c2.72113,-2.72112 2.72113,-7.17731 0,-9.89844c-1.36001,-1.36064 -3.15452,-2.04102 -4.94922,-2.04102zM36,7.99219c1.0208,0 2.04018,0.39333 2.82617,1.17969c0.00065,0 0.0013,0 0.00195,0c1.57487,1.57488 1.57487,4.08137 0,5.65625l-1.93945,1.93945l-5.65625,-5.65625l1.93945,-1.93945c0.78599,-0.78636 1.80732,-1.17969 2.82813,-1.17969zM29.11133,13.23242l5.65625,5.65625l-18.07422,18.07422c-0.05863,0.05823 -0.13289,0.10283 -0.2168,0.12695l-7.79297,2.22656l2.22656,-7.79492c0,-0.00065 0,-0.0013 0,-0.00195c0.02293,-0.08063 0.06493,-0.15282 0.12695,-0.21484z"></path></g></g></svg>
                  </button>
                  <button class="text-gray-600 transition hover:text-red-600">
                    <span class="sr-only">Remove item</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4"> <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                  </button>
                </div>
              </li>
            @empty
                <h3>Your cart is empty</h3>
            @endforelse
          </ul>
         
          @if (count($cart) != 0)
            <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
              <div class="w-screen max-w-lg space-y-4">
                <dl class="space-y-0.5 text-sm text-gray-700">
                  <div class="flex justify-between">
                    <dt>Subtotal</dt>
                    <dd>₦ {{number_format($total)}}</dd>
                  </div>

                  <div class="flex justify-between">
                    <dt>VAT</dt>
                    <dd>₦ 0.00</dd>
                  </div>

                  <div class="flex justify-between">
                    <dt>Discount</dt>
                    <dd>₦ 0.00</dd>
                  </div>

                  <div class="flex justify-between !text-base font-medium">
                    <dt>Total</dt>
                    <dd class="font-bold">₦ {{number_format($total)}}</dd>
                  </div>
                </dl>

                <div class="flex justify-end">
                  <span
                    class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="-ml-1 mr-1.5 h-4 w-4"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"
                      />
                    </svg>

                    <p class="whitespace-nowrap text-xs">2 Discounts Applied</p>
                  </span>
                </div>

                <div class="flex justify-end">
                  <button id="checkout" class="block rounded bg-gray-700 px-5 py-3 text-sm text-white transition hover:bg-gray-600">
                    Checkout
                  </button>
                </div>
              </div>
            </div>
          @else
            <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
              <div class="w-screen max-w-lg space-y-4">
                <dl class="space-y-0.5 text-sm text-gray-700">
                  <div class="flex justify-between">
                    <dt>Subtotal</dt>
                    <dd>₦ 0.00</dd>
                  </div>

                  <div class="flex justify-between">
                    <dt>VAT</dt>
                    <dd>₦ 0.00</dd>
                  </div>

                  <div class="flex justify-between">
                    <dt>Discount</dt>
                    <dd>₦ 0.00</dd>
                  </div>

                  <div class="flex justify-between !text-base font-medium">
                    <dt>Total</dt>
                    <dd>₦ 0.00</dd>
                  </div>
                </dl>

                <div class="flex justify-end">
                  <span
                    class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="-ml-1 mr-1.5 h-4 w-4"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z"
                      />
                    </svg>

                    <p class="whitespace-nowrap text-xs">0 Discounts Applied</p>
                  </span>
                </div>

                <div class="flex justify-end">
                  <a
                    href="#"
                    class="block rounded bg-gray-700 px-5 py-3 text-sm text-white transition hover:bg-gray-600"
                  >
                    Checkout
                  </a>
                </div>
              </div>
            </div>
          @endif
          
        </div>
      </div>
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>

        const priceElements = document.querySelectorAll('[data-price]')
        const totalElements = document.querySelectorAll('[data-total]')
        const qtyElements   = document.querySelectorAll('[data-quantity]')
        const userElements  = document.querySelectorAll('[data-user]')
        const prodElements  = document.querySelectorAll('[data-product]')
        const checkout      = document.getElementById('checkout')
        let totalPrice      = 0
        let clickCount      = 0
        const orders        = [];

        checkout.addEventListener('click', (e) => {
          e.preventDefault();
          clickCount++
          

          if(clickCount == 1){
            for (let i = 0; i < priceElements.length; i++) {
                const price = parseFloat(priceElements[i].dataset.price);
                const total = parseFloat(totalElements[i].dataset.total);
                const qty   = parseFloat(qtyElements[i].dataset.quantity);
                const user  = parseFloat(userElements[i].dataset.user);
                const prod  = parseFloat(prodElements[i].dataset.product);
                

                totalPrice += total;

                const order = {
                                "user_id": user,
                                "product_id": prod,
                                "order_quantity": qty,
                                "order_price": price,
                                "total": total
                              }
                orders.push(order);
                
            }
            console.log(orders);
            const csrfToken = window.Laravel.csrfToken;

            fetch('/checkout', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-Token': csrfToken,
                },
                body: JSON.stringify({ data: orders })
              })
              .then(response => response.json())
              .then(data => console.log(data))
              .catch(error => console.log(error));


          }else{
            Swal.fire('Hmm!','Baba, dis checkout tin na once na! 😞','error')
            return false
          }

           
        })

</script>
</body>
</html>
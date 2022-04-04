<div>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <div class="payment-card">
        <div class="payment-card__field payment-card__field--large">
          <label for="card-number" class="payment-card__field-label">Card number</label>
          @error('InvalidCard')
              {{ $message }}
          @enderror
          <input wire:model="cardNum" class="payment-card__input payment-card__input--large" id="card-number" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" />
        </div>
        <div class="payment-card__extra-fields">
          <div class="payment-card__field payment-card__field--small">
            <label for="card-expiry" class="payment-card__field-label">Expiry date</label>
            <input class="payment-card__input" inputmode="numeric" id="card-expiry" placeholder="xx/xx" />
          </div>
          <div class="payment-card__field payment-card__field--small">
            <label for="card-ccv" class="payment-card__field-label">CCV</label>
            <input class="payment-card__input" inputmode="numeric" id="card-ccv" placeholder="xxx" />
          </div>
        </div>
        <button wire:click="pay({{ $car_id }})" class="text-button">PAY</button>
    </div>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    @if (session()->has('message'))
        <script>
            Swal.fire(
            'AWESOME!',
            'Payment Made Successfully!',
            'success'
            )

            setTimeout( () => {
                location.reload();
            }, 1000);
        </script>
    @endif
</div>


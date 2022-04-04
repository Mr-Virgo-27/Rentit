<div>
    <script src="https://kit.fontawesome.com/9b62d0cfda.js" crossorigin="anonymous"></script>

    <section class="justify-center">
        <br><br>
        <div class="container">
            <table class="responsive-table">
              <caption>Manage Applications</caption>
              <hr id="approve">
              <hr>
              <thead>
                <tr>
                  <th scope="col">Vehicle Type</th>
                  <th scope="col">Pickup Date</th>
                  <th scope="col">Requested Until</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($rents as $rent)
                  @if ($rent->status == 'pending')
                  <tr>
                    <th scope="row">{{ $rent->cars->vehicle_type }}</th>
                    <td id="" data-title="Studio">{{ $rent->pickup_date }}</td>
                    <td id="" data-title="Released">{{ $rent->end_date }}</td>
                    <td data-title="Worldwide Gross" data-type="currency">{{ $rent->status }}</td>
                    <td data-title="Domestic Gross" data-type="currency">
                        <button title="approve application" wire:click="approve({{ $rent->users->id }},{{ $rent->cars->id }})" class="blue-button"><i class="fas fa-check-circle"></i></button>
                        <button title="deny application" wire:click="deny({{ $rent->users->id }},{{ $rent->cars->id }})" class="red-button"><i class="fas fa-times-circle"></i></button>
                        <button title="view more" wire:click="" class="yellow-button"><i style="color: blue" class="far fa-eye"></i></button>
                    </td>
                  </tr>
                  @elseif ($rent->status=='Rented')
                  <tr>
                    <th scope="row">{{ $rent->cars->vehicle_type }}</th>
                    <td id="" data-title="Studio">{{ $rent->pickup_date }}</td>
                    <td id="" data-title="Released">{{ $rent->end_date }}</td>
                    <td data-title="Worldwide Gross" data-type="currency">{{ $rent->status }}</td>
                    <td data-title="Domestic Gross" data-type="currency">
                        <button title="Update As Returned" wire:click="bringIn({{ $rent->users->id }},{{ $rent->cars->id }})" class="blue-button"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
                        <button title="view more" wire:click="" class="yellow-button"><i style="color: blue" class="far fa-eye"></i></button>
                    </td>
                  </tr>
                  @else
                  <tr>
                    <th scope="row">{{ $rent->cars->vehicle_type }}</th>
                    <td data-title="Studio">{{ $rent->pickup_date }}</td>
                    <td data-title="Released">{{ $rent->end_date }}</td>
                    <td data-title="Worldwide Gross" data-type="currency">{{ $rent->status }}</td>
                    <td data-title="Domestic Gross" data-type="currency">
                        <a title="view more" href="/more-details/{{ $rent->cars->id }}" class="yellow-button"><i style="color: blue" class="far fa-eye"></i></a>
                        <a title="delete application" class="yellow-button" wire:click="remove({{ $rent->id }})"><i style="color:red" class="fa-solid fa-circle-minus"></i></a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
              </tbody>
            </table>
          </div>
    </section>
</div>

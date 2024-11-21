@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Checkout</h3>
                        <p><strong>Car:</strong> {{ $car->carname }}</p>
                        <p><strong>Price:</strong> ${{ number_format($car->price, 2) }}</p>

                        <form action="{{ route('order.create', $car) }}" method="POST">
                            @csrf

                            <!-- Quantity Input -->
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1"
                                       class="form-control" oninput="updateTotal()">
                            </div>

                            <!-- Total Price -->
                            <div class="form-group">
                                <p><strong>Total:</strong> $<span id="totalPrice">{{ $car->price }}</span></p>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-block" style="background-color: #6f42c1; color: white; border: none; padding: 10px 15px; font-size: 16px; border-radius: 5px;">
                                Proceed to PayPal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to update the total price dynamically
        function updateTotal() {
            const quantity = document.getElementById('quantity').value;
            const price = {{ $car->price }};  // Make sure this is a number, not a string
            const totalPrice = price * quantity;
            document.getElementById('totalPrice').textContent = totalPrice.toFixed(2);
        }
    </script>
@endsection

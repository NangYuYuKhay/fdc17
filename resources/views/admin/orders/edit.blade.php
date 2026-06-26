@extends('admin.layouts.app')

@section('title','Edit order')

@section('style')
<style>

</style>
@endsection

@section('header','Edit order')

@section('content')
    <a href="{{ url('/admin/orders') }}" class="btn btn-primary">
        <i class="fa-solid fa-arrow-left me-1"></i>
        Back
    </a>
  
    @csrf()
    <div class="row">
        <div class="col-md-5 mb-3">
            <label class="form-label">Order Date</label>
            <input type="date" class="form-control" name="order_date" autofocus value="{{ old('order_date') }}" >
            @if( $errors->has('order_date') )
                <p class="text-danger">{{ $errors->first('order_date') }}</p>    
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            <div class="mb-3">
                <label class="form-label" value="search_value">Search items</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="txt-search">
                    <button type="button" class="input-group-text btn btn-primary" id="btn-search">Search</button>
                </div>
            </div>
            <div class="mb-3">
                <div class="row" id="search-item">
                
                </div>
            </div>
        </div>
        <div class="col-5 mb-3">
            <label class="form-label">Selected items</label>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Item name</th>
                    <th scope="col">Price per item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total price</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
 
                </tbody>
            </table>
            <div class="mb-3">
                <button class="btn btn-primary" id="btn-order">
                <i class="fa-solid fa-cart-arrow-down"></i>
                    Update order
                </button>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(()=>{
        $('[name="order_date"]').val("{{ $order->order_date}}")
        let selectedItems = @json($orderItems);
        console.log(selectedItems)
        loadSelectedItems()
        search();

        $('#btn-search').click(()=>{
            search();
        })

        $('#btn-order').click(()=>{
            if(selectedItems.length == 0){
                alert('Your cart is empty! Please add at least one item to check out.')
                return ;
            }
            const order_date = $('[name="order_date"]').val()
            const total_price = getTotal()
            const items = JSON.stringify(selectedItems)

            $.ajax({
                url : "/admin/orders/{{ $order->id }}",
                type : "POST" ,
                data :{
                    "_token" : "{{ csrf_token() }}",
                    "_method" : "PUT" ,
                    "order_date" : order_date,
                    "total_price" : total_price,
                    "items" :items,
                },
                success: function(response) {
                    alert(response)

                    //reinitialization
                    selectedItems = []
                    loadSelectedItems()
                    $('[name = "order_date"]').val(getToday())
                    $('#text-search').val('')
                    search();
                }
            });
        })

        $(document).on('click','.btn-add-to-cart',(event)=>{
            const addToCartButton = $(event.currentTarget)
            
            const foundItem = selectedItems.find(item => item.id == addToCartButton.data('id'));

            const selectedItem = {
                id : addToCartButton.data('id'),
                item_name : addToCartButton.data('item-name'),
                item_code : addToCartButton.data('item-code'),
                price : addToCartButton.data('price'),
                qty : 0,
                sub_total : 0,
            }
            if(foundItem){
                foundItem.qty = foundItem.qty +1 ;
                foundItem.sub_total = foundItem.qty * foundItem.price; 
            }else{
                selectedItem.qty = 1;
                selectedItem.sub_total = selectedItem.qty * selectedItem.price;
                selectedItems.push(selectedItem);
            }
            // console.log(selectedItems)
            loadSelectedItems();
        })

        $(document).on('click','.delete-item',(event)=>{
            const id = $(event.currentTarget).data('id')
            selectedItems = selectedItems.filter((item) => item.id != id)
            loadSelectedItems()

        })

        $(document).on('click','.add-qty',(event)=>{
            const id = $(event.currentTarget).data('id')
            selectedItems = selectedItems.map((item) => {
                if(item.id == id){
                    item.qty++;
                    item.sub_total = item.qty * item.price;
                }
                return item
            })
            loadSelectedItems()
            
        })
        $(document).on('click','.substract-qty',(event)=>{
            const id = $(event.currentTarget).data('id')
            selectedItems = selectedItems.map((item) => {
                if(item.id == id && item.qty>1){
                    item.qty--;
                    item.sub_total = item.qty * item.price;
                }
                return item
            })
            loadSelectedItems()
            
        })
       function search(){
            const search_value = $('#txt-search').val()
            console.log(search_value)
            $.ajax({
                url: "/admin/orders/search-items?search_value=" + search_value ,
                mettod: "GET",
                    success : function(response){
                        //  console.log(response)
                         $('#search-item').empty()

                         response.forEach(item => {
                            const card = `
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="http://localhost:8000/storage/${item.item_image}" class="card-img-top" style="height:200px;">
                                        <div class="card-body">
                                            <h5 class="card-title">${item.item_name}</h5>
                                            <p class="card-text">${item.item_code}</p>
                                            <button type="button" class="btn-add-to-cart btn btn-primary" data-id="${item.id}" data-item-name="${item.item_name}" data-item-code="${item.item_code}" data-price="${item.price}">Add to card</button>
                                        </div>
                                    </div>
                                </div>
                               `
                               $('#search-item').append(card)
                         });
                         
                    }
                });
       }

       function loadSelectedItems(){
            $('.table tbody').empty();
            selectedItems.forEach(item => {
                    const itemRow =  `
                    <tr>
                        <td>${item.item_name}</td>
                        <td>${item.price}</td>
                        <td>
                            <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary substract-qty" data-id="${item.id}">-</button>
                            <input type="text" class="form-control text-center" value="${item.qty}" disabled style="width:50px;"/>
                            <button type="button" class="btn btn-primary add-qty" data-id="${item.id}">+</button>
                            </div>
                        </td>
                        <td>${item.sub_total}</td>
                        <td>
                            <button class="btn btn-danger delete-item" data-id="${item.id}">
                            <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    `
                $('.table tbody').append(itemRow)  
            });
            const totalRow =`
            <tr class="text-center fw-bolder">
                <td colspan="3">Total</td>
                <td colspan="2">${getTotal()}</td>
            </tr>
            `
            $('.table tbody').append(totalRow)  

       }

       function getToday(){
        const today = new Date();
        const year = today.getFullYear();
        const month = (today.getMonth()+1).toString().padStart(2,'0');
        const day = today.getDate().toString().padStart(2,'0');
        return `${year}-${month}-${day}`
       }

       function getTotal(){
        let total = 0 ;
        selectedItems.forEach(item => {
              total += item.price * item.qty
              
          });
          return total
       }
    })

</script>
@endsection
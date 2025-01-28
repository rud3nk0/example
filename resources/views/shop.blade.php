<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <h1>Welcome on {{ __('Shop') }} page</h1>  
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create a service
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('shop.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Name</label>
                            <div class="input-group mb-3">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name"
                                        aria-label="Name" aria-describedby="name-addon">
                            </div>

                            <label for="description">Description</label>
                            <div class="input-group mb-3">
                                <input type="text" name="description" id="description" class="form-control" placeholder="Description"
                                        aria-label="Description" aria-describedby="name-addon">
                            </div>

                            <label for="price">Price</label>
                            <div class="input-group mb-3">
                                <input type="text" name="price" id="price" class="form-control" placeholder="Price"
                                        aria-label="Price" aria-describedby="name-addon">
                            </div>

                            <label for="photo">Photo</label>
                            <div class="input-group mb-3">
                                <input type="file" name="photo" id="photo" class="form-control"
                                        aria-label="photo">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="block">
        @foreach ($shops as $shop)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/uploadPhotos/' . $shop->photo) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$shop->name}}</h5>
                <p class="card-text">{{$shop->description}}</p>
                <p>{{$shop->price}}</p>
                <button>
                <a href="{{route('shop.show', $shop->id)}}">Need details ?</a>
                </button>
                
            </div>
        </div>
        @endforeach
        
        
    </div>
    
</x-app-layout>
<style>
    .card{
        margin-left: 50px;
    }

    .block{
        display: flex;
        justify-content: center;
    }
</style>
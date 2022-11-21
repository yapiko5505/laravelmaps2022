<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規データ作成
        </h2>
       
        <x-message :message="session('message')" />     
    </x-slot>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-4 sm:p-8">
                <form method="post" action="{{route('map.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <div class="w-full flex flex-col">
                            <label for="mapNameAdd" class="font-semibold leading-none mt-4">名称</label>
                            @error('name')
                                <p class="text-danger" style="color:red">{{$message}}</p>
                            @enderror
                            <input type="text" name="name" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="name" value="{{old('name')}}" placeholder="mapname">
                        </div>
                        <div class="w-full flex flex-col">
                            <label for="mapNameAdd" class="font-semibold leading-none mt-4">住所</label>
                            @error('address')
                                <p class="text-danger" style="color:red">{{$message}}</p>
                            @enderror
                            <input type="text" name="address" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="address" value="{{old('address')}}" placeholder="address">
                        </div>
                        <div class="w-full flex flex flex-col">
                            <label for="categorySelect" class="font-semibold leading-none mt-4">カテゴリー選択</label>
                            @error('category')
                                <p class="text-danger" style="color:red">{{$message}}</p>
                            @enderror
                            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                                <option value="" disabled selected style="display: none;">カテゴリーを選択してください。</option>
                                @foreach(App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    

                    <x-primary-button class="myclass">
                        送信する
                    </x-primary-button>
                    
                </form>
            </div>
        </div>

</x-app-layout>
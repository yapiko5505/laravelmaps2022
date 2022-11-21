<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            地図データ一覧
        </h2>
       
        <x-message :message="session('message')" />     
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-6">
            <table class="text-left w-full border-collapse mt-8"> 
                <tr class="bg-green-600">
                    <!-- <th class="p-3 text-left text-white">#</th>  -->
                    <th class="p-3 text-left text-white">名称</th>
                    <th class="p-3 text-left text-white">住所</th>
                    <th class="p-3 text-left text-white">カテゴリー</th>
                    <th class="p-3 text-left text-white">編集</th>
                    <th class="p-3 text-left text-white">削除</th>
                </tr>
                @foreach($maps as $key=>$map)
                <tr class="bg-white">
                    <!-- <td class="border-gray-light border hover:bg-gray-100 p-3">{{$map->id}}</td>  -->
                    <td class="border-gray-light border hover:bg-gray-100 p-3">
                        <a href="{{route('map.show', $map)}}">{{$map->name}}</a>
                    </td>
                    <td class="border-gray-light border hover:bg-gray-100 p-3">{{$map->address}}</td>
                    <td class="border-gray-light border hover:bg-gray-100 p-3">{{$map->category->name}}</td>
                    <td class="border-gray-light border hover:bg-gray-100 p-3">
                        <a href="{{route('map.edit', $map)}}">
                            <x-primary-button class="myclass2">
                                編集する
                            </x-primary-button>
                        </a>
                    </td>
                    <td class="border-gray-light border hover:bg-gray-100 p-3">
                        <form method="post" action="{{route('map.destroy', $map)}}">
                            @csrf
                            @method('delete')
                            <x-primary-button class="mycalss3" onClick="return confirm('本当に削除しますか？');">
                                削除する
                            </x-primary-button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <br>
            {{$maps->links()}}
        </div>
    </div>
</x-app-layout>

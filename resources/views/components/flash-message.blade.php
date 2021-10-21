@props(["message"])
    <div
        x-data="{show:true}"
        x-init="setTimeout(()=>show=false,2000)"
        x-show="show"
        class="fixed bottom-4 right-4 right-0 bg-blue-500 p-4 text-white rounded-2xl">
        <p>
            {{$message}}
        </p>
    </div>

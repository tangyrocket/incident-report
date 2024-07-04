<div class="p-6 print shadow-md rounded-lg report-content bg-gray-100 ">    
    <div class="mb-4">
        <div class="list-disc list-inside mt-1 ml-5">
            @foreach ($incident->corrective_action as $action)
            <span class="block mb-2 text-gray-700 dark:text-gray-300">{{ $action->description }}</span>
            @endforeach
        </div>
    </div>
</div>

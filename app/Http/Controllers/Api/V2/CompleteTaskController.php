<?php 
namespace App\Http\Controllers\Api\V2;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class CompleteTaskController extends Controller
{
    public function __invoke(Request $request, Task $task)
    {
        // Validasi input
        $validatedData = $request->validate([
            'is_completed' => 'required|boolean'
        ]);

        // Update status task
        $task->is_completed = $validatedData['is_completed'];
        $task->save();

        // Kembalikan response
        return new TaskResource($task);
    }
}

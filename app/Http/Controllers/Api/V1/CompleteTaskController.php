<?php 
namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

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

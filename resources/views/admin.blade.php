<x-app-layout>
    <div class=" flex justify-center items-center flex-col gap-10">
        <h2 class="text-lg font-semibold mb-4">Active Users</h2>
        <table class="w-[80%] bg-white border border-gray-200 rounded-lg shadow-md mb-8">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">User Name</th>
                    <th class="py-3 px-6 text-left">User Email</th>
                    <th class="py-3 px-6 text-left">Role</th>
                    <th class="py-3 px-6 text-left">Created At</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($users as $user)
                    <tr>
                        <td class="py-3 px-6">{{ $user->name }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6">{{ $user->role }}</td>
                        <td class="py-3 px-6">{{ $user->created_at }}</td>
                        <td class="py-3 px-6">
                            @role('admin')
                                <form action="{{ url('/user/destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            @endrole()
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-lg font-semibold mb-4">Deleted Users</h2>
        <table class="w-[80%] bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-red-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">User Name</th>
                    <th class="py-3 px-6 text-left">User Email</th>
                    <th class="py-3 px-6 text-left">Role</th>
                    <th class="py-3 px-6 text-left">Created At</th>
                    <th class="py-3 px-6 text-left">Deleted At</th>
                </tr>
            </thead>
            <tbody class=" text-red-500 text-sm font-light">
                @foreach ($deletedUsers as $deletedUser)
                    @if ($deletedUser != null)
                        <tr class="bg-red-100">
                            <td class="py-3 px-6">{{ $deletedUser->name }}</td>
                            <td class="py-3 px-6">{{ $deletedUser->email }}</td>
                            <td class="py-3 px-6">{{ $deletedUser->role }}</td>
                            <td class="py-3 px-6">{{ $deletedUser->created_at }}</td>
                            <td class="py-3 px-6">{{ $deletedUser->deleted_at }}</td>
                            <td class="py-3 px-6">
                                <form action="/restore-user/{{ $deletedUser->id }}" method="POST">
                                    @csrf
                                    @role('admin')
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                            Restore User
                                        </button>
                                    @endrole()

                                </form>

                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

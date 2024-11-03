<x-app-layout>
    <div class=" flex justify-center items-center flex-col gap-10">
        <h2 class="text-lg font-semibold mb-4">Active Users</h2>
        <table class="w-[80%] bg-white border border-gray-200 rounded-lg shadow-md mb-8">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-4 px-6 text-left border-b border-gray-200">User Name</th>
                    <th class="py-4 px-6 text-left border-b border-gray-200">User Email</th>
                    <th class="py-4 px-6 text-left border-b border-gray-200">Role</th>
                    <th class="py-4 px-6 text-left border-b border-gray-200">Created At</th>
                    <th class="py-4 px-6 text-left border-b border-gray-200">Admin Section </th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="py-4 px-6 border-b border-gray-200">{{ $user->name }}</td>
                        <td class="py-4 px-6 border-b border-gray-200">{{ $user->email }}</td>
                        <td class="py-4 px-6 border-b border-gray-200">{{ $user->role }}</td>
                        <td class="py-4 px-6 border-b border-gray-200">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="py-4 px-6 border-b border-gray-200 flex space-x-2">
                            @role('admin')
                                <form action="{{ url('/user/destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            @endrole
                            @role('admin')
                                <form action="{{ url('/user/update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-200">
                                        {{ $user->role == 'client' ? 'Make Moderator' : 'Make Client' }}
                                    </button>
                                </form>
                            @endrole
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <h2 class="text-lg font-semibold mb-4">Deleted Users</h2>
        <table class="w-[80%] bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-white text-gray-600 uppercase text-sm leading-normal">
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
                        <tr class="bg-white border-t-[1px]">
                            <td class="py-3 px-6 ">{{ $deletedUser->name }}</td>
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

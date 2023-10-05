<section class="bd_dashboard-msg-section">
    <div class="flex justify-between w-full items-center mb-3">
        <h2 class="text-xl font-bold">Messaggi recenti</h2>
        <a href="{{ route('user.messages') }}" class="text-white focus:ring-4 focus:outline-none focus:ring-bd_btn-shadow font-medium rounded-full text-sm px-4 py-2 text-center mr-3 md:mr-0 bd_btn">
            Visualizza di piu
        </a>
    </div>
    <div class="w-full rounded-xl bg-white shadow-md overflow-y-scroll">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 w-1/6">
                        Visitatore
                        <span class="block font-normal text-gray-500">+ Email</span>
                    </th>
                    <th scope="col" class="px-6 py-3 w-3/6">
                        Messaggio
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 w-1/6">
                        Ricevuto
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            <div class="text-base font-semibold">{{ $message->guest_name }}</div>
                            <div class="font-normal text-gray-500">{{ $message->guest_email }}</div>
                        </th>
                        <td class="px-6 py-4">
                            <p class="truncate-custom text-sm">{{ $message->content }}</p>
                        </td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            {{ $message->created_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

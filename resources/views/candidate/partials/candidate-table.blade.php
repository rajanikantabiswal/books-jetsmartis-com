<div class="px-4 pb-3 mt-4">
    @if ($candidates->isEmpty())
        <div class="text-center py-3">
            <span class="font-semibold">No record found</span>
        </div>
    @else
        <div class="relative overflow-x-auto ">
            <table id="filter-table"
                class="pagination-table table-auto w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Conducted Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Candidate Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Exam Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Vendor
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Exam Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Conducted by
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Client
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr
                            class="bg-white border-b  hover:bg-gray-50 ">
                            <td class="px-6 py-4 whitespace-nowrap font-medium">
                                {{ $candidate->conducted_date }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4  text-gray-900 whitespace-nowrap ">
                                {{ $candidate->first_name }} {{ $candidate->last_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $candidate->email_id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if (!is_null($candidate->phone))
                                    {{ $candidate->country_code }} {{ $candidate->phone }}
                                @endif

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $candidate->company->company_name }}

                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $candidate->exam->exam_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $candidate->vendor->vendor_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap capitalize">
                                {{ $candidate->status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $candidate->conducted_user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $candidate->client->client_name }}
                            </td>

                            <td class="flex items-center px-6 py-4">
                                <span data-id="{{ $candidate->id }}"
                                    class="edit-button font-medium text-blue-600 cursor-pointer hover:underline"
                                    onclick="showDiv('EditCandidateModal')">Edit</span>
                                <span data-id="{{ $candidate->id }}"
                                    class="delete-button font-medium text-red-600 cursor-pointer hover:underline ms-3">Remove</span>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="pagination">
            {!! $candidates->appends(request()->query())->links() !!}
        </div>
        

    @endif


</div>
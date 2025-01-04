<!DOCTYPE html> 
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Smartcomp - Management Dashboard</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/dashboardAdmin.css') }}">
   <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet">
</head>
<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg">
       <div class="container-fluid">
           <a class="navbar-brand" href="#">
               <img src="{{ asset('images/gambar-removebg-preview.png') }}" alt="Smartcomp Logo" height="30">
               Smartcomp
           </a>
           <div class="ms-auto">
               <a href="{{ route('logout') }}" class="btn btn-light">Logout</a>
           </div>
       </div>
   </nav>

   <!-- Workshop Management -->
   <div class="container mt-4" id="manageWorkshop">
       <div class="management-card">
           <h2>Manage Workshop</h2>
           <button class="btn btn-manage mb-3" data-bs-toggle="modal" data-bs-target="#addWorkshopModal">
               Add New Workshop
           </button>
           <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Workshop Name</th>
                           <th>Type</th>
                           <th>Date</th>
                           <th>Price</th>
                           <th>Capacity</th>
                           <th>Status</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($workshops as $workshop)
                       <tr>
                           <td>{{ $workshop->id }}</td>
                           <td>{{ $workshop->name }}</td>
                           <td>{{ $workshop->type }}</td>
                           <td>{{ $workshop->date }}</td>
                           <td>{{ $workshop->price }}</td>
                           <td>{{ $workshop->capacity }}</td>
                           <td>{{ $workshop->status }}</td>
                           <td>
                               <button class="btn btn-primary" onclick="editWorkshop({{ $workshop->id }}, '{{ $workshop->name }}', '{{ $workshop->type }}', '{{ $workshop->date }}', {{ $workshop->price }}, {{ $workshop->capacity }}, '{{ $workshop->status }}')">Edit</button>
                               <form action="{{ route('workshop.delete', $workshop->id) }}" method="POST" style="display:inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

   <!-- Competition Management -->
   <div class="container mt-4" id="manageCompetition">
       <div class="management-card">
           <h2>Manage Competition</h2>
           <button class="btn btn-manage mb-3" data-bs-toggle="modal" data-bs-target="#addCompetitionModal">
               Add New Competition
           </button>
           <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                           <th>ID</th>
                           <th>Competition Name</th>
                           <th>Start Date</th>
                           <th>End Date</th>
                           <th>Entry Fee</th>
                           <th>Status</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($competitions as $competition)
                       <tr>
                           <td>{{ $competition->id }}</td>
                           <td>{{ $competition->name }}</td>
                           <td>{{ $competition->start_date }}</td>
                           <td>{{ $competition->end_date }}</td>
                           <td>{{ $competition->entry_fee }}</td>
                           <td>{{ $competition->status }}</td>
                           <td>
                           <button class="btn btn-primary" 
                                onclick="editCompetition(
                                 {{ $competition->id }}, 
                                '{{ $competition->name }}', 
                                '{{ $competition->start_date }}', 
                                 '{{ $competition->end_date }}', 
                                 {{ $competition->entry_fee }}, 
                                 '{{ $competition->status }}', 
                             )">Edit</button>
                               <form action="{{ route('competition.delete', $competition->id) }}" method="POST" style="display:inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

   <!-- Payment Management -->
   <div class="container mt-4" id="managePayment">
       <div class="management-card">
           <h2>Manage Payment</h2>
           <div class="table-responsive">
               <table class="table">
                   <thead>
                       <tr>
                           <th>Payment ID</th>
                           <th>User</th>
                           <th>Event Type</th>
                           <th>Event Name</th>
                           <th>Amount</th>
                           <th>Date</th>
                           <th>Status</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($payments as $payment)
                       <tr>
                           <td>{{ $payment->payment_id }}</td>
                           <td>{{ $payment->user }}</td>
                           <td>{{ $payment->event_type }}</td>
                           <td>{{ $payment->event_name }}</td>
                           <td>{{ $payment->amount }}</td>
                           <td>{{ $payment->date }}</td>
                           <td>{{ $payment->status }}</td>
                           <td>
                               <form action="{{ route('payment.status.update', $payment->payment_id) }}" method="POST">
                                   @csrf
                                   <select name="status" class="form-select" onchange="this.form.submit()">
                                       <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                       <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                   </select>
                               </form>
                           </td>
                           <td>
                               <form action="{{ route('payment.delete', $payment->payment_id) }}" method="POST" style="display:inline;">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>

   <!-- Add Workshop Modal -->
   <div class="modal fade" id="addWorkshopModal" tabindex="-1">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Add New Workshop</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                   <form action="{{ route('workshop.store') }}" method="POST">
                       @csrf
                       <div class="mb-3">
                           <label class="form-label">Workshop Name</label>
                           <input type="text" class="form-control" name="workshopName" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Type</label>
                           <input type="text" class="form-control" name="workshopType" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Date</label>
                           <input type="date" class="form-control" name="workshopDate" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Price</label>
                           <input type="number" class="form-control" name="workshopPrice" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Capacity</label>
                           <input type="number" class="form-control" name="workshopCapacity" required>
                       </div>
                       <button type="submit" class="btn btn-manage">Save Workshop</button>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <!-- Edit Workshop Modal -->
   <div class="modal fade" id="editWorkshopModal" tabindex="-1">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Edit Workshop</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                   <form action="{{ route('workshop.update') }}" method="POST">
                       @csrf
                       @method('PUT')
                       <input type="hidden" name="workshopId" id="edit_workshopId">
                       <div class="mb-3">
                           <label class="form-label">Workshop Name</label>
                           <input type="text" class="form-control" name="workshopName" id="edit_workshopName" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Type</label>
                           <input type="text" class="form-control" name="workshopType" id="edit_workshopType" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Date</label>
                           <input type="date" class="form-control" name="workshopDate" id="edit_workshopDate" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Price</label>
                           <input type="number" class="form-control" name="workshopPrice" id="edit_workshopPrice" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Capacity</label>
                           <input type="number" class="form-control" name="workshopCapacity" id="edit_workshopCapacity" required>
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Status</label>
                           <select class="form-control" name="workshopStatus" id="edit_workshopStatus" required>
                               <option value="open">Open</option>
                               <option value="active">Active</option>
                               <option value="closed">Closed</option>
                           </select>
                       </div>
                       <button type="submit" class="btn btn-manage">Update Workshop</button>
                   </form>
               </div>
           </div>
       </div>
   </div>

   <!-- Add Competition Modal -->
   <!-- Edit Competition Modal -->
<div class="modal fade" id="editCompetitionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Competition</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('competition.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="competitionId" id="edit_competitionId">
                    <div class="mb-3">
                        <label class="form-label">Competition Name</label>
                        <input type="text" class="form-control" name="competitionName" id="edit_competitionName" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="edit_competitionDateStart" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="edit_competitionDateEnd" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Entry Fee</label>
                        <input type="number" class="form-control" name="entry_fee" id="edit_competitionFee" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" id="edit_competitionStatus" required>
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script>
       function editWorkshop(id, name, type, date, price, capacity, status) {
           document.getElementById('edit_workshopId').value = id;
           document.getElementById('edit_workshopName').value = name;
           document.getElementById('edit_workshopType').value = type;
           document.getElementById('edit_workshopDate').value = date;
           document.getElementById('edit_workshopPrice').value = price;
           document.getElementById('edit_workshopCapacity').value = capacity;
           document.getElementById('edit_workshopStatus').value = status;
           
           new bootstrap.Modal(document.getElementById('editWorkshopModal')).show();
       }

    // Updated editCompetition function with proper parameter handling
function editCompetition(id, name, startDate, endDate, entryFee, status) {
    // Set values to form fields
    document.getElementById('edit_competitionId').value = id;
    document.getElementById('edit_competitionName').value = name;
    document.getElementById('edit_competitionDateStart').value = startDate;
    document.getElementById('edit_competitionDateEnd').value = endDate;
    document.getElementById('edit_competitionFee').value = entryFee;
    document.getElementById('edit_competitionStatus').value = status;

    // Show modal
    new bootstrap.Modal(document.getElementById('editCompetitionModal')).show();
}

// Updated saveCompetitionChanges function with proper error handling and CSRF token
function saveCompetitionChanges() {
    const form = document.getElementById('editCompetitionForm');
    const formData = new FormData(form);
    
    // Add CSRF token
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
    formData.append('_method', 'PUT'); // Add method spoofing for Laravel

    // Get competition ID
    const competitionId = document.getElementById('edit_competitionId').value;
    
    fetch(`/competition/update/${competitionId}`, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
        body: formData,
        credentials: 'same-origin'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Hide modal
            bootstrap.Modal.getInstance(document.getElementById('editCompetitionModal')).hide();
            // Show success message
            alert('Competition updated successfully!');
            // Reload page to show updated data
            window.location.reload();
        } else {
            throw new Error(data.message || 'Failed to update competition');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert(`Error updating competition: ${error.message}`);
    });
}

// Add form validation function
function validateCompetitionForm() {
    const form = document.getElementById('editCompetitionForm');
    const startDate = new Date(document.getElementById('edit_competitionDateStart').value);
    const endDate = new Date(document.getElementById('edit_competitionDateEnd').value);
    
    // Check if all required fields are filled
    if (!form.checkValidity()) {
        alert('Please fill in all required fields.');
        return false;
    }
    
    // Validate date range
    if (endDate < startDate) {
        alert('End date cannot be earlier than start date.');
        return false;
    }
    
    // Validate entry fee
    const entryFee = parseFloat(document.getElementById('edit_competitionFee').value);
    if (entryFee < 0) {
        alert('Entry fee cannot be negative.');
        return false;
    }
    
    return true;
}

// Add event listener for form submission
document.getElementById('editCompetitionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    if (validateCompetitionForm()) {
        saveCompetitionChanges();
    }
});
        

   </script>
</body>
</html>
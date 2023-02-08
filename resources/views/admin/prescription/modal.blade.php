@if(count($bookings) > 0)
<div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <form action="{{ route('store.prescription') }}" method="POST">
    @csrf
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="app">
            <input type="hidden" name="patient_id" value="{{ $booking->user_id }}">
            <input type="hidden" name="doctor_id" value="{{ $booking->doctor_id }}">
            <input type="hidden" name="date" value="{{ $booking->date }}">

            <div class="form-group">
                <label>Disease</label>
                <input type="text" name="disease" required placeholder="Disease" class="form-control">
            </div>

            <div class="form-group">
                <label>Symptoms</label>
                <textarea name="symptoms" required class="form-control" placeholder="Symptoms"></textarea>
            </div>

            <div class="form-group">
                <label>Medicine</label>
                <add-btn></add-btn>
            </div>

            <div class="form-group">
                <label>Procedure to use medicine</label>
                <textarea name="procedure" required class="form-control" placeholder="Procedure"></textarea>
            </div>

            <div class="form-group">
                <label>Feedback</label>
                <textarea name="feedback" required class="form-control" placeholder="Feedback"></textarea>
            </div>

            <div class="form-group">
                <label>Signature</label>
                <input type="text" name="signature" required placeholder="Sugnature" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </form>
  </div>
</div>
@endif
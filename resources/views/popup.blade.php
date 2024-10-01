
<div id="popup">
    <div class="modal fade" id="jaarbasisDetail" tabindex="-1" role="dialog" aria-labelledby="jaarbasisDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jaarbasisDetailLabel">Jaarbasis detail {{ $jaarbasis['naam'] }}&nbsp;{{ $jaarbasis['trap'] }} </h5>
                <button type="button" class="close " data-bs-dismiss="modal" aria-label="Close" style="float:right;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(isset($jaarbasis))
                    <label>Naam</label><p>{{ $jaarbasis['naam'] }}</p>
                    <label>Trap</label><p>{{ $jaarbasis['trap'] }}</p>
                    <label>Jaarbasis</label><p>{{ $jaarbasis['loon'] }}</p>
                @endif
                @if(isset($jaarbasis_indexed))
                <label>Jaarbasis(index)</label><p>{{ $jaarbasis_indexed['loon'] }}</p>
                <label>SZ bijdrage</label><p>{{ $jaarbasis_indexed['sz_bijdrage'] }}</p>
                <label>Voorheffing</label><p>{{ $jaarbasis_indexed['voorheffing'] }}</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
</div>

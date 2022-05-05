<div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="timeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header"  style="background: #D7E7E4;">
                        <h5 class="modal-title" id="timeModalLabel">Select Timestamp</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body mb-3">
                        <form>
                            <!-- input in text format, dd/mm/yyyy, hide if not wanted. if using href with button, then change within js -->
                            <div class="mb-5">
                                <label for="date">Date</label>
                                <input id="date" class="form-control" type="text" placeholder="Date" aria-label="dateLabel" disabled>
                            </div>
                            
                            <!-- insert buttons with the timestamp here -->
                            <div style="text-align: center;">
                                <!-- example timestamp -->
                                
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="
                            float: left;
                            width: 150px;
                            height: 40px;
                            background: #A7C7E7;
                            border: 1px solid #707070;
                            color: black;
                        ">Cancel</button>
                    </div>
                </div>
            </div>
          </div>
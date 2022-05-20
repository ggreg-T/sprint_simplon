<div class="modal fade" id="modalChoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex flex-column">
                <h5 class="modal-title" id="exampleModalLabel-login">Filter</h5>
                </div>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('filterSorte') }}">
                    <div class="d-flex flex-row aling-itmes-center">
                        <div class="form-group form-floating mb-3 me-4 flex-fill">
                            <input type="number" step="1" min="0" max="1000" class="form-control" name="inputDistMin" id="floatingDistMin" placeholder="Distance min">
                            <label for="floatingDistMin">Distance min Km</label>
                        </div>
                        <div class="form-group form-floating mb-3 ms-4 flex-fill">
                            <input type="number" step="1" min="0" max="1000" class="form-control" name="inputDistMax" id="floatingDistMax" placeholder="Distance max">
                            <label for="floatingDistMax">Distance max Km</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row">
                        <div class="form-group form-floating mb-3 me-4 flex-fill">
                            <input type="number" step="30" min="0" max="10000" class="form-control" name="inputTimeMin" id="floatingTimeMin" placeholder="Time min">
                            <label for="floatingTimeMin">Time min minutes</label>
                        </div>
                        <div class="form-group form-floating mb-3 ms-4 flex-fill">
                            <input type="number" step="30" min="0" max="10000" class="form-control" name="inputTimeMax" id="floatingTimeMax" placeholder="Time max">
                            <label for="floatingTimeMax">Time max minutes</label>
                        </div>
                    </div>

                    <div class="d-flex flex-row justify-content-between">
                        <div class="d-flex flex-fill form-group mb-3 me-3">
                            <input type="radio" class="btn-check" name="inputDifficulty" id="success-outlined1" value=⭐>
                            <label class="btn btn-outline-success flex-fill" for="success-outlined1">⭐</label>
                        </div>
                        <div class="d-flex flex-fill form-group mb-3 me-3">
                            <input type="radio" class="btn-check" name="inputDifficulty" id="success-outlined2" value=⭐⭐>
                            <label class="btn btn-outline-success flex-fill" for="success-outlined2">⭐⭐</label>
                        </div>
                        <div class="d-flex flex-fill form-group mb-3 me-3">
                            <input type="radio" class="btn-check" name="inputDifficulty" id="success-outlined3" value=⭐⭐⭐>
                            <label class="btn btn-outline-success flex-fill" for="success-outlined3">⭐⭐⭐</label>
                        </div>
                        <div class="d-flex flex-fill form-group mb-3 me-3">
                            <input type="radio" class="btn-check" name="inputDifficulty" id="success-outlined4" value=⭐⭐⭐⭐>
                            <label class="btn btn-outline-success flex-fill" for="success-outlined4">⭐⭐⭐⭐</label>
                        </div>
                        <div class="d-flex flex-fill form-group mb-3">
                            <input type="radio" class="btn-check" name="inputDifficulty" id="success-outlined5" value=⭐⭐⭐⭐⭐>
                            <label class="btn btn-outline-success flex-fill" for="success-outlined5">⭐⭐⭐⭐⭐</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary" style="width: 45%;">Go</button>
                    </div>
                </form>
                    
                    {{-- <select name="filter" id="filter" class="form-select me-3 my-3" aria-label="Default select example">
                        <option selected>Chose the distance or time</option>
                        <option value="1" > <= 1 km</option>
                        <option value="2"> <= 2 km</option>
                        <option value="5"> <= 5 km</option>
                        <option value="10"> <= 10 km</option>
                        <option value="15"> <= 15 km</option>
                        <option value="20"> <= 20 km</option>
                        <option value="25"> <= 25 km</option>
                        <option value="50"> <= 50 km</option>
                        <option value="51"> >= 50 km</option>
                        <option value="60"> <= 60 min</option>
                        <option value="120"> <= 120 min</option>
                        <option value="180"> <= 180 min</option>
                        <option value="240"> <= 240 min</option>
                        <option value="300"> <= 300 min</option>
                        <option value="360"> <= 360 min</option>
                        <option value="361"> >= 360 min</option>
                        <option value="⭐">Difficulty ⭐</option>
                        <option value="⭐⭐">Difficulty ⭐⭐</option>
                        <option value="⭐⭐⭐">Difficulty ⭐⭐⭐</option>
                        <option value="⭐⭐⭐⭐">Difficulty ⭐⭐⭐⭐</option>
                        <option value="⭐⭐⭐⭐⭐">Difficulty ⭐⭐⭐⭐⭐</option>
                    </select> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
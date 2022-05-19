<div class="">
    <form id="formFilterSorte" methode="GET" action="{{ route('filterSorte') }}">
        <div class="d-flex flex-row">
            <select name="filter" id="filter" class="form-select me-3 my-3" aria-label="Default select example">
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
            </select>
                <div class = "d-flex flex-fill me-3 my-3">
                    <input type="radio" name = "sorte" value="asc" class="btn-check" id="privateFalse" autocomplete="off" required>
                    <label class="btn btn-outline-primary flex-fill pt-2 fw-bold fs-4" for="privateFalse"><span></span>👆</label>
                </div> 
                <div class = "d-flex flex-fill me-3 my-3">
                    <input type="radio" name = "sorte" value="desc" class="btn-check" id="privateTrue" autocomplete="off">
                    <label class="btn btn-outline-primary flex-fill pt-2 fw-bold fs-4" for="privateTrue"><span>👇</span></label>
                </div> 
                <button type="submit" class="btn btn-info my-3"" id="btnSubmit"><span>✅</span></button>
            </div>
        <div>
    </form>
</div>

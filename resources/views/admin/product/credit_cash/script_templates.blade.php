<script type="text/template" id="documents">
    <div class="multi-field">
        <div class="mt-4 mb-4"><a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a></div>
        <textarea name="documents[]" class="form-control "></textarea>
    </div>
</script>

<script type="text/template" id="bids">
    <div class="multi-field">
        <div class="mt-4 mb-4">
            <a href="javascrit:void(0);" class="remove_multi_field btn btn-danger">Удалить</a>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="col-form-label text-md-right">{{ __('Мин. сумма') }}</label>

                    <div>
                        <input type="text" class="form-control numeric min_amount" name="bids[<%= count %>][min_amount]" >
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">{{ __('Макс. сумма') }}</label>

                        <div>
                            <input type="text" class="form-control numeric" name="bids[<%= count %>][max_amount]" >
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="col-form-label text-md-right">{{ __('Процентная ставка') }}</label>

                        <div>
                            <input type="text" class="form-control numeric" name="bids[<%= count %>][percent]" >
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</script>

@props([
    'id' =>  rand(),
    'border' => false,
    'borderPrimary' => false,
    'noBorder' => false,
    'stripedRows' => true,
    'stripedCols' => false,
    'hover' => true,

])
<div class="table-responsive">
    <table 
            class="table 
                    text-nowrap 
                    {{ !$border ?: 'table-bordered' }}
                    {{ !$borderPrimary ?: 'border-primary' }}
                    {{ !$noBorder ?: 'table-borderless' }}
                    {{ !$stripedRows ?: 'table-striped' }}
                    {{ !$stripedCols ?: 'table-striped-columns' }}
                    {{ !$hover ?: 'table-hover' }}
                    "
    >
        <thead>
            <tr>
                {{ $head }}
            </tr>
        </thead>

        <tbody>
            {{ $body }}
        </tbody>
    </table>

</div>
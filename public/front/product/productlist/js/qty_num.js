    // 判斷加減，加減多少
    function click(num_var) {
        num = num + num_var;
        $(".qty_num").text(num);
    };

    var num = 1;
    $(".minus").click(
        function() {
            if (num == 1) {
                $(".qty_num").text(1);
            } else {
                click(-1);
            }

        });

    $(".add").click(
        function() {
            click(1);
        });
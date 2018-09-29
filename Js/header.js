$(function () {
    var original = $("main#pageContent").html();
    
    $(document).off('mouseenter', 'a#lnkGroups, div#groupDrop').on('mouseenter', 'a#lnkGroups, div#groupDrop', function () {
        $("div#groupDrop").show();
    }).off('mouseleave', 'a#lnkGroups, div#groupDrop').on('mouseleave', 'a#lnkGroups, div#groupDrop', function () {
        $("div#groupDrop").hide();
    });
    
    $(document).off('submit', "form#frmSearchBox").on('submit', "form#frmSearchBox", function (e) {
        e.preventDefault();

        var term = $("input#txtSearchBox").val();
        if (term !== null && term.length > 0)
        {
            $("main#pageContent").html(original.replace(new RegExp(term, "g"), "<span class='highlight'>" + term + "</span>"));
        }
        else
        {
            $("main#pageContent").html(original);
        }
    });
});
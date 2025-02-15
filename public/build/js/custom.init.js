$(document).ready(function () {
    // $("ul li").click(function() {
    $(".myLi").click(function () {
        // var i = $(this).index() + 1
        var i = $(this).val();
        // console.log(i);
        var table = $(".data-table").DataTable();
        if (i == 1) {
            table.button(".buttons-csv").trigger();
        } else if (i == 2) {
            table.button(".buttons-excel").trigger();
        } else if (i == 3) {
            table.button(".buttons-pdf").trigger();
        } else if (i == 4) {
            table.button(".buttons-print").trigger();
        } else if (i == 5) {
            table.button(".buttons-copy").trigger();
        }
    });
});

function loading(value) {
    if (value == "stop") {
        $(".overlay").hide();
        document.body.style.cursor = "auto";
    } else {
        $(".overlay").show();
        document.body.style.cursor = "wait";
    }
}

function swal(text, cls, position = "center", timer = 2500) {
    // Swal.fire(res.text, '', res.cls, 3000);
    Swal.fire({
        position: position, //top-right, top-left, center, bottom-right, bottom-left
        icon: cls,
        title: text,
        showConfirmButton: false,
        timer: timer,
    });
}

function printThis(targetId) {
    jQuery("#" + targetId.trim()).print();
}

function exportTable(table, fileType, name, orientation = "p") {
    if (fileType == "pdf") {
        var pdf = new jsPDF();
        pdf.autoTable({
            html: "." + table,
        });
        pdf.save(name + ".pdf");
        // $('.'+table).tableHTMLExport({type: fileType, filename: name+'.'+fileType, orientation:orientation});
        return;
    }
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll(".table"));
}

function decimal(t) {
    t = parseFloat(t);
    let decimalPlaces = parseInt($("#decimal_value").val(), 10) || 2; // Get decimal places from input or default to 2
    return parseFloat(t.toFixed(decimalPlaces));
}

function number_format(number, dec_point = ".", thousands_sep = ",") {
    const decimals = parseFloat($("#decimal_value").val()) || 0;
    if (isNaN(number) || !isFinite(number)) {
        return "";
    }
    const absNumber = Math.abs(number);
    const roundedNumber =
        Math.round(absNumber * Math.pow(10, decimals)) / Math.pow(10, decimals);
    const integerPart = Math.trunc(roundedNumber)
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
    const decimalPart =
        decimals > 0
            ? (roundedNumber - Math.trunc(roundedNumber))
                  .toFixed(decimals)
                  .slice(2)
            : "";
    return `${integerPart}${decimalPart ? `${dec_point}${decimalPart}` : ""}`;
}

// Function to convert Arabic number to English
function replaceArNumbers(str, toArabic = "en") {
    return replaceNumbers(str, toArabic);
}
// Function to convert English number to Arabic
function replaceNumbers(str, toArabic = "ar") {
    const arabicNumbers = "٠١٢٣٤٥٦٧٨٩.";
    const englishNumbers = "0123456789.";
    const replacementMap = new Map(
        toArabic == "ar"
            ? [...englishNumbers].map((char, i) => [char, arabicNumbers[i]])
            : [...arabicNumbers].map((char, i) => [char, englishNumbers[i]])
    );
    return [...str].map((char) => replacementMap.get(char) || char).join("");
}

document.addEventListener("DOMContentLoaded", () => {
    const bellIcon = document.querySelector(".vibrate");
    setInterval(() => {
        bellIcon.classList.add("animate");
        setTimeout(() => {
            bellIcon.classList.remove("animate");
        }, 300); // Match the duration of the animation in CSS
    }, 5000); // 5 seconds interval
});

document.addEventListener("DOMContentLoaded", function () {
    const numberInputs = document.querySelectorAll("input.number");
    numberInputs.forEach((input) => {
        input.setAttribute("inputmode", "decimal");
        input.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9.]/g, "");
        });
    });
});

function stripHtmlTags(html) {
    var doc = new DOMParser().parseFromString(html, "text/html");
    var text = doc.body.textContent || doc.body.innerText || "";
    // Remove extra spaces and blank lines
    text = text.replace(/\s+/g, " ").trim(); // Replace multiple spaces with a single space and trim edges
    text = text.replace(/(\r\n|\n|\r){2,}/g, "\n"); // Replace multiple newlines with a single newline
    text = text.replace(/(\n){2,}/g, "\n"); // Replace multiple consecutive newlines with a single newline
    return text;
}

// Header update function for export
function setExportHeader(win, structure) {
    if (!win || !win.document || !win.document.body) return;
    // $(win.document.body).find('table').find('thead').html(''); // Clear the existing header
    // var thead = $(win.document.body).find('table').find('thead');
    var thead = $(win.document.body).find("table").find("thead");
    $(thead).html("");
    structure.forEach(function (row) {
        var tr = $("<tr/>");
        row.forEach(function (cell) {
            var th = $("<th/>")
                .text(cell.content || "")
                .attr("colspan", cell.colspan);
            if (cell.className) {
                th.addClass(cell.className);
            }
            tr.append(th);
        });
        $(thead).append(tr);
    });
}

// Footer update function for export
function setExportFooter(win, structure) {
    if (!win || !win.document || !win.document.body) return;
    // $(win.document.body).find('table').find('tfoot').html(''); // Clear the existing header
    // var tfoot = $(win.document.body).find('table').find('tfoot');
    var tfoot = $(win.document.body).find("table").find("tfoot");
    $(tfoot).html("");
    structure.forEach(function (row) {
        var tr = $("<tr/>");
        row.forEach(function (cell) {
            var th = $("<th/>")
                .text(cell.content || "")
                .attr("colspan", cell.colspan);
            if (cell.className) {
                th.addClass(cell.className);
            }
            tr.append(th);
        });
        $(tfoot).append(tr);
    });
}

function extractErrorMessages(err) {
    // return validation error messages and general error message from laravel response
    const errors = err.responseJSON?.errors;
    const messages = [];
    if (errors) {
        for (const field in errors) {
            if (Array.isArray(errors[field])) {
                messages.push(...errors[field]); // Add all messages for the field
                messages.push(""); // Add a blank line
            }
        }
    } else {
        messages.push(err.responseJSON?.message ?? err.statusText); // Fallback to general message
    }
    return messages;
}

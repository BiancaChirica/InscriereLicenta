var tablesLicense = document.getElementById('tables-license');
var tablesDissertation = document.getElementById('tables-dissertation');

function checkLicense() {
    tablesDissertation.style.display = 'none';
    tablesLicense.style.display = 'block';
}

function checkDissertation() {
    tablesDissertation.style.display = 'block';
    tablesLicense.style.display = 'none';
}


$(document).ready(function () {
    populateNews();
    bindFormNewComitee();
});


var appendComitees = function(comitees){

    var Lindex = $('#tables-license').children().length;
    var Dindex = $('#tables-dissertation').children().length;
    comitees.forEach(function (comitee, index) {
        switch (comitee.type) {
            case 'license':
                Lindex += 1;
                $('#tables-license').append(
                    '<div class="table-license">' +
                    '    <div class="header-table">' +
                    '       <h3>Committees ' + Lindex + '</h3>' +
                    '       <div class="table-edit-delete">' +
                    '           <h3 class="edit-committees">EDIT</h3>' +
                    '           <h3>/</h3>' +
                    '           <h3 class="delete-committees">DELETE</h3>' +
                    '       </div>' +
                    '   </div>' +
                    '   <table>' +
                    '   <thead>' +
                    '       <tr>' +
                    '           <th>Name</th>' +
                    '           <th>Email</th>' +
                    '           <th>Degree</th>' +
                    '       </tr>' +
                    '   </thead>' +
                    '    <tbody>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[0].name + '</td>' +
                    '       <td class="column">' + comitee.profs[0].email + '</td>' +
                    '       <td class="column">' + comitee.profs[0].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[1].name + '</td>' +
                    '       <td class="column">' + comitee.profs[1].email + '</td>' +
                    '       <td class="column">' + comitee.profs[1].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[2].name + '</td>' +
                    '       <td class="column">' + comitee.profs[2].email + '</td>' +
                    '       <td class="column">' + comitee.profs[2].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[3].name + '</td>' +
                    '       <td class="column">' + comitee.profs[3].email + '</td>' +
                    '       <td class="column">' + comitee.profs[3].degree + '</td>' +
                    '       </tr>' +
                    '    </tbody>' +
                    '    </table>' +
                    '</div>'
                );
                break;
            case 'disertation':
                Dindex += 1;
                $('#tables-dissertation').append(
                    '<div class="table-license">' +
                    '    <div class="header-table">' +
                    '       <h3>Committees ' + Dindex + '</h3>' +
                    '       <div class="table-edit-delete">' +
                    '           <h3 class="edit-committees">EDIT</h3>' +
                    '           <h3>/</h3>' +
                    '           <h3 class="delete-committees">DELETE</h3>' +
                    '       </div>' +
                    '   </div>' +
                    '   <table>' +
                    '   <thead>' +
                    '       <tr>' +
                    '           <th>Name</th>' +
                    '           <th>Email</th>' +
                    '           <th>Degree</th>' +
                    '       </tr>' +
                    '   </thead>' +
                    '    <tbody>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[0].name + '</td>' +
                    '       <td class="column">' + comitee.profs[0].email + '</td>' +
                    '       <td class="column">' + comitee.profs[0].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[1].name + '</td>' +
                    '       <td class="column">' + comitee.profs[1].email + '</td>' +
                    '       <td class="column">' + comitee.profs[1].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[2].name + '</td>' +
                    '       <td class="column">' + comitee.profs[2].email + '</td>' +
                    '       <td class="column">' + comitee.profs[2].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[3].name + '</td>' +
                    '       <td class="column">' + comitee.profs[3].email + '</td>' +
                    '       <td class="column">' + comitee.profs[3].degree + '</td>' +
                    '       </tr>' +
                    '       <tr>' +
                    '       <td class="column">' + comitee.profs[4].name + '</td>' +
                    '       <td class="column">' + comitee.profs[4].email + '</td>' +
                    '       <td class="column">' + comitee.profs[4].degree + '</td>' +
                    '       </tr>' +
                    '    </tbody>' +
                    '    </table>' +
                    '</div>'
                );
                break;
            default:
                break
        }
    });
};

var populateNews = function () {
    $.ajax({
        url: window.API.baseUrl + 'comitees.json',
        method: "GET",
        success: function (response) {
            if (window.API.validateResponse(response)) {
                appendComitees(response.data);
                $('#page-loader').addClass('hidden');
            } else {
                $('#page-loader').html('ERROR! Please refresh the page!</br>[ ' + response.message + ' ]');
            }
        },
        error: function () {
            $('#page-loader').html('ERROR! Please refresh the page!');
        }
    });
};

var bindFormNewComitee = function () {
    $('#form-create-comitee').off('submit').on('submit', function () {
        event.preventDefault();

        var status = $('#ajax-status');
        var profs = $("#choose-license").val();
        var type = $('#type-license').is(':checked') ? 'license' : 'disertation';

        var data = {
            "type": type,
            "profs": profs
        };

        if (type === 'license') {
            if (profs.length !== 4) {
                alert('You must select 4 professors');
                return;
            }
        }
        else if (type === 'disertation') {
            if (profs.length !== 5) {
                alert('You must select 5 professors');
                return;
            }
        }else{
            return;
        }

        $('#save-loader').removeClass('hidden');
        $.ajax({
            url: window.API.baseUrl + 'create_comitee.php',
            method: 'POST',
            data: data,
            success: function (response) {
                if (window.API.validateResponse(response)) {
                    appendComitees([ response.data ]);

                    $('#save-loader').addClass('hidden');
                    status.html('New saved!');
                    status.removeClass('error');
                    status.addClass('success');

                } else {
                    $('#save-loader').addClass('hidden');
                    status.html('ERROR! ' + response.message);
                    status.removeClass('success');
                    status.addClass('error');
                }
            },
            error: function () {
                $('#save-loader').addClass('hidden');
                status.html('ERROR!');
                status.removeClass('success');
                status.addClass('error');
            }
        });
    });
};
$(document).ready(function () {
    addRow()
    updateResources()

    document.querySelectorAll(".add-incoming-route").forEach(button => {
        button.addEventListener("click", addRow)
    })
    document.getElementById("show_villages").addEventListener("click", showVillagesTable)
    $("#troops-select")
        .select2()
        .on("change", updateResources)

    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("change", () => input.value = cleanInputs(input))
    })

    $("input[id^='production']").on("change", updateResources)

})

const cleanInputs = input => input.value.replace(/\D/g, "")


const showVillagesTable = () => {
    const tableHtml = document.getElementById("villages_net").outerHTML
    Swal.fire({
        title: 'Villages Net Resources',
        html: tableHtml,
        showCloseButton: true,
        showConfirmButton: false,
    })
}

const updateResources = () => {


    const {availableLumber, availableClay, availableIron, availableCrop} = calculateAvailable()

    const {neededLumber, neededClay, neededIron, neededCrop} = calculateNeeded()

    const netLumber = availableLumber - neededLumber
    const netClay = availableClay - neededClay
    const netIron = availableIron - neededIron
    const netCrop = availableCrop - neededCrop

    document.getElementById("needed_lumber").value = Math.ceil(neededLumber)
    document.getElementById("needed_clay").value = Math.ceil(neededClay)
    document.getElementById("needed_iron").value = Math.ceil(neededIron)
    document.getElementById("needed_crop").value = Math.ceil(neededCrop)

    document.getElementById("net_lumber").value = Math.ceil(netLumber)
    document.getElementById("net_clay").value = Math.ceil(netClay)
    document.getElementById("net_iron").value = Math.ceil(netIron)
    document.getElementById("net_crop").value = Math.ceil(netCrop)
}

const calculateAvailable = () => {
    const availableResources = {
        lumber: +$("#production_lumber").val(),
        clay: +$("#production_clay").val(),
        iron: +$("#production_iron").val(),
        crop: +$("#production_crop").val()
    }

    calculateResourceEffects("#incoming-routes", availableResources)
    calculateResourceEffects("#out-routes", availableResources, false)

    return {
        availableLumber: availableResources.lumber,
        availableClay: availableResources.clay,
        availableIron: availableResources.iron,
        availableCrop: availableResources.crop
    }
}

const calculateResourceEffects = (rowsSelector, availableResources, positive = true) => {
    document.querySelectorAll(`${rowsSelector} tbody tr`).forEach(row => {
        ['lumber', 'clay', 'iron', 'crop'].forEach(resource => {
            const incomingValue = +(row.querySelector(`input[name*='TradeRoute[${resource}][]']`).value)
            positive
                ? availableResources[resource] += incomingValue
                : availableResources[resource] -= incomingValue
        })
    })
}


const calculateNeeded = () => {
    let neededLumber = 0, neededClay = 0, neededIron = 0, neededCrop = 0
    const selectedTroops = $("#troops-select").val()

    selectedTroops.forEach(troopId => {
        const option = $(`#troops-select option[value="${troopId}"]`)
        const lumber = +option.data('lumber')
        const clay = +option.data('clay')
        const iron = +option.data('iron')
        const crop = +option.data('crop')
        const trainTime = +option.data('train-time')
        const troopsPerHour = 3600 / trainTime
        neededLumber += lumber * troopsPerHour
        neededClay += clay * troopsPerHour
        neededIron += iron * troopsPerHour
        neededCrop += crop * troopsPerHour
    })
    return {neededLumber, neededClay, neededIron, neededCrop}
}


const refreshRemoveButton = () => {
    $(".removeRow").on('click', e => {
        e.target.closest("tr").remove()
        updateResources()
    })
}

const refreshChangeOnInput = () => {
    document.querySelectorAll("#incoming-routes input").forEach(input => {
        input.addEventListener("change", updateResources)
    })
}

function addRow() {
    let myTbody = document.querySelector("#incoming-routes>tbody")
    let newRow = myTbody.insertRow(-1)

    let villageCell = newRow.insertCell(0)
    let lumberCell = newRow.insertCell(1)
    let clayCell = newRow.insertCell(2)
    let ironCell = newRow.insertCell(3)
    let cropCell = newRow.insertCell(4)
    let removeCell = newRow.insertCell(5)


    villageCell.innerHTML = document.getElementById("village_select").outerHTML
    lumberCell.innerHTML = '<input class="form-control" name="incomingTradeRoute[lumber][]" value=0>'
    clayCell.innerHTML = '<input class="form-control" name="incomingTradeRoute[clay][]" value=0>'
    ironCell.innerHTML = '<input class="form-control" name="incomingTradeRoute[iron][]" value=0>'
    cropCell.innerHTML = '<input class="form-control" name="incomingTradeRoute[crop][]" value=0>'
    removeCell.innerHTML = '<button type="button" class="btn btn-danger removeRow"><i class="bi bi-trash"></i></button>'


    refreshRemoveButton()
    refreshChangeOnInput()
}

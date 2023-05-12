<div
    class="d-flex flex-column justify-center align-center"
    style="
    height: 100vh;
    background-color: rgb(30, 35, 47);
    "
>
    <h2 class="white--text"></h2>
    <div
    class="shopping-container text-center"
    style="position: relative; z-index: 2"
    >
        <div>
            <div class="text-center">
            <div class="text-h5 white--text">商品清單</div>
            <button onclick="readFile()">讀取商品</button>
            </div>
        </div>
        <div style="position: relative;width:100%;top:24%;height:5%">
            <input id="goodName-search" class="search-input" style="position: relative;left:49%;height:100%" type="text" placeholder="" v-model="search" />
        </div>
        <div id ="section-container" class="text-left" style="position: relative; width:100% ;top:25%">
            <!--
            <input class="tab" id="tab1" type="radio" name="tabs" checked>
            <label class="tab" for="tab1">1</label>

            <div class="divider"></div>

            <section id="content1">
                <table>
                    <tr>
                        <th scope="col">商品名稱</th>
                        <th scope="col">價格</th>
                        <th scope="col">是否有庫存</th>
                    </tr>
                    <tr id="goodA">
                        <td class="goodName" ></td>
                        <td class="goodPrice"></td>
                        <td class="goodStatus"></td>
                    </tr>
                    <tr id="goodB">
                        <td class="goodName" ></td>
                        <td class="goodPrice"></td>
                        <td class="goodStatus"></td>
                    </tr>
                    <tr id="goodC">
                        <td class="goodName" ></td>
                        <td class="goodPrice"></td>
                        <td class="goodStatus"></td>
                    </tr>
                </table>
            </section>
            -->
        </div>
    </div>
    <img
        style="position: absolute; top: 30px; left: 120px; z-index: 1"
        src="{{ asset('images/blue.svg') }}"
    />
    <img
        style="position: absolute; top: 50px; right: 120px; z-index: 1"
        src="{{ asset('images/red.svg') }}"
    />
    <img
        style="position: absolute; bottom: -10px; right: 180px; z-index: 1"
        src="{{ asset('images/purple.svg') }}"
    />
</div>
<script>
    /*
    export default {
    data() {
        return {
        showError: false,
        };
    },
    mounted() {
    },
    methods: {
    },
    };
    */

    /*瀏覽器內無法直接讀取本地檔案，使用ajax請求呼叫的形式*/
    function readFile() {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'goods.txt', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var content = xhr.responseText;
          var lines = content.split('\n');

          for (var i = 0; i < lines.length; i++) { //移除空元素
            var item = lines[i];

            if (item.trim() === '') {
                lines.splice(i, 1);
            }
          }
          lines = groupSplit(lines);
          tabcount = lines.length;
          buildTabSection(tabcount);
          dataInsert(lines);
          console.log(lines);
          //console.log(lines);
          document.getElementById('goodName-search').addEventListener('input', function(event) {
            var input = event.target;
            var filter = input.value.trim().toUpperCase();
            if (filter === '') {
                // 輸入為空，重新建立原始表格
                buildTabSection(tabcount);
                dataInsert(lines);
            } else {
                // 執行搜尋
                buildTabSection(tabcount);
                dataInsert(lines);
                searchTable(filter);
            }
         });
        }
      };
      xhr.send();
    }

function groupSplit(array){
    var groups = [];
    var groupSize = 3;

    for (var i = 0; i < array.length; i += groupSize) {
        var group = array.slice(i, i + groupSize);
        groups.push(group);
    }
    return(groups);
}

function buildTabSection(tabcount){
    var container = document.getElementById('section-container');
    container.innerHTML = ''; //避免重複產生

    for (var i = 1; i <= tabcount; i++) {

    var input = document.createElement('input');
    input.className = 'tab';
    input.id = 'tab' + i;
    input.type = 'radio';
    input.name = 'tabs';
    if (i === 1) {
        input.checked = true; // 設置第一個為選中狀態
    }


    var label = document.createElement('label');
    label.className = 'tab';
    label.setAttribute('for', 'tab' + i);
    label.textContent = i;

    label.style.position = 'relative';
    label.style.left = '10%';


    var divider = document.createElement('div');
    divider.className = 'divider';


    var section = document.createElement('section');
    section.id = 'content' + i;


    var table = document.createElement('table');


    var tableHeaderRow = document.createElement('tr');
    var tableHeader1 = document.createElement('th');
    var tableHeader2 = document.createElement('th');
    var tableHeader3 = document.createElement('th');
    tableHeader1.textContent = '商品名稱';
    tableHeader2.textContent = '價格';
    tableHeader3.textContent = '是否有庫存';
    tableHeaderRow.appendChild(tableHeader1);
    tableHeaderRow.appendChild(tableHeader2);
    tableHeaderRow.appendChild(tableHeader3);
    table.appendChild(tableHeaderRow);


    for (var j = 1; j <= 3; j++) {
        var tableRow = document.createElement('tr');
        var td1 = document.createElement('td');
        var td2 = document.createElement('td');
        var td3 = document.createElement('td');
        td1.className = 'goodName';
        td2.className = 'goodPrice';
        td3.className = 'goodStatus';
        tableRow.appendChild(td1);
        tableRow.appendChild(td2);
        tableRow.appendChild(td3);
        table.appendChild(tableRow);
    }

    // 添加到父容器中
    container.appendChild(input);
    container.appendChild(label);
    container.appendChild(divider);
    section.appendChild(table);
    container.appendChild(section);
    }
}

function dataInsert(tabs){
    for(var i = 0; i < tabs.length ; i++){
        var content = 'content'+ (i+1);
        var section = document.getElementById(content);
        var tableRows = section.getElementsByTagName('tr');
        //console.log(tableRows);

        var rowValues = tabs[i];


        for (var j = 0; j < rowValues.length; j++) {
            var tableCells = tableRows[j + 1].getElementsByTagName('td');
            //console.log(tableCells);
            var cellValue = rowValues[j];
            var cellData = cellValue.split(' ');
            //console.log(cellData);

            for (var k = 0; k < cellData.length; k++) {
            tableCells[k].textContent = cellData[k];
            }
        }
    }
}

function searchTable(filter) {
    console.log(filter);
    var sectionContainer = document.getElementById('section-container');

    // 创建新的表格
    var newTable = document.createElement('table');
    newTable.classList.add('search-results-table');

    //建立標題行
    var headerRow = document.createElement('tr');
    var headerCell1 = document.createElement('th');
    var headerCell2 = document.createElement('th');
    var headerCell3 = document.createElement('th');
    headerCell1.textContent = '商品名稱';
    headerCell2.textContent = '價格';
    headerCell3.textContent = '是否有庫存';
    headerRow.appendChild(headerCell1);
    headerRow.appendChild(headerCell2);
    headerRow.appendChild(headerCell3);

    // 加到新表格中
    newTable.appendChild(headerRow);


    var rowsToDisplay = [];

    var sections = sectionContainer.querySelectorAll('section');
    sections.forEach(function (section) {
        var table = section.querySelector('table');
        var rows = table.getElementsByTagName('tr');

        for (var i = 1; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            var nameCell = cells[0];
            //console.log(cells);
            //console.log(nameCell);
            if (nameCell) {
                var value = nameCell.textContent || nameCell.innerText;
                console.log(value);
                var productName = value.toUpperCase();

                // 判断是否匹配搜索条件
                //console.log(filter);
                if (productName.startsWith(filter)) {
                    rowsToDisplay.push(rows[i].cloneNode(true));
                }
            }
        }
    });

    // 清空搜索结果容器
    sectionContainer.innerHTML = '';

    // 将匹配的資料添加到新的表格中
    rowsToDisplay.forEach(function (row) {
        newTable.appendChild(row);
    });
    sectionContainer.appendChild(newTable);
}





</script>
<style scoped>
.shopping-container {
/* frame login */

box-sizing: border-box;

/* Auto layout */

display: flex;
flex-direction: column;
align-items: center;
padding: 32px;
/*gap: 64px;*/

width: 480px;
height: 556px;

/* Vue Color System/white/0.06 */

background: rgba(255, 255, 255, 0.06);
/* Vue Color System/white/0.12 */

border: 1px solid rgba(255, 255, 255, 0.12);
border-radius: 10px;
}
#section-container {
-ms-box-orient: horizontal;
display: -webkit-box;
display: -moz-box;
display: -ms-flexbox;
display: -moz-flex;
display: -webkit-flex;
display: flex;

-webkit-flex-flow: row wrap;
flex-flow: row wrap;
}

section {
    -ms-flex-order: 1;
    order: 1;
    display: none;
    width:100%;
}

div.divider {
    -ms-flex-order: 6;
    order: 6;
}
input, label {
    -ms-flex-order: 12;
    order: 12;
}

div.divider {
width:100%;
}

input.tab {
display: none;
}

label.tab {
padding: 10px;
}

input:checked + label {
color: #ff0000;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
display: block;
}

table{
    width:80%;
    left:10%;
    position: relative;
    border-collapse:separate;
    color: #ffffff;
}
tr{
    border: 1px solid ;
    background-color: #123667;
    border-collapse:separate;
}
td{
    background-color:#4cbdc1;
    text-align:center;
}

.input-text {
    width: 416px;
    height: 56px;
    background-color: transparent;

    /* Vue Color System/white/0.6 */

    border: 1px solid rgba(255, 255, 255, 0.6);
    border-radius: 4px;
    outline: none;
    color: #ffffff;
    padding: 2px 12px;
}

.white--text{
    color: #ffffff;
}


</style>

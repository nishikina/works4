        function validateForm() {
            const gender = document.querySelector('input[name="gender"]:checked');
            const ageGroup = document.getElementById('age_group');
            const prefecture = document.getElementById('prefecture');
            const satisfaction = document.querySelector('input[name="satisfaction"]:checked');
            const quality = document.querySelector('input[name="quality"]:checked');
            const checkboxes = document.querySelectorAll('input[name="toothbrush_experience[]"]');
            const impressionChange = document.querySelector('input[name="impression_change"]:checked');

            if (!gender) {
                alert('性別を選択してください。');
                return false;
            }
            if (ageGroup.value === "") {
                alert('年代を選択してください。');
                return false;
            }
            if (prefecture.value === "") {
                alert('住所（都道府県名のみ）を選択してください。');
                return false;
            }
            if (!satisfaction) {
                alert('総合的にどのくらい満足していますかを選択してください。');
                return false;
            }
            if (!quality) {
                alert('製品の品質に対してどう思いますかを選択してください。');
                return false;
            }
            let checkedOne = Array.prototype.slice.call(checkboxes).some(x => x.checked);
            if (!checkedOne) {
                alert('ヘッドの大きい歯ブラシを使用してどうでしたか？の項目で少なくとも1つ選択してください。');
                return false;
            }
            if (!impressionChange) {
                alert('使用前と使用後の印象は変わりましたかを選択してください。');
                return false;
            }

            return true;
        }
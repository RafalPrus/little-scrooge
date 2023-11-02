<template >
    <div class="baseform">
        <form>
            <h2>Login</h2>
            <div>
                <label>Name</label>
                <input type="text">
            </div>
            <div>
                <label>Passoword</label>
                <input type="text">
            </div>
            <button>Zaloguj</button>
        </form>
    </div>
</template>

<style scoped>
.baseform {
    width: max-content;
    margin: auto;
    display: block;
}

form {
    min-width: 300px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    border-radius: 12px;
    border: 0px;
    color:#424242;
    background-color: #f5f5f5;
}

h2 {
    text-align: center;
}

input {
    padding: 0.4rem;
    border-radius: 6px;
    border: none;
}

label {
    margin-top: 1rem;
}

form div {
    display: flex;
    flex-direction: column;
}

button {
    border: none;
    border-radius: 3px;
    padding: 0.6rem;
    margin-top: 15px;
    color: white;
    font-weight: bold;
    background-color: #2196f3;
}

button:hover  {
    background-color: #1976d2;
}
</style>
<template>
    <section>
        <form @submit.prevent="registerAction">
            <h1>Inscrivez-vous</h1>
            <div v-if="errorMessage" class="error">{{ errorMessage }}</div>
            <div v-if="successMessage" class="success">{{ successMessage }}</div>
            <div class="row">
                <input type="text" name="last_name" v-model="last_name" placeholder="Nom" required>
                <input type="text" name="first_name" v-model="first_name" placeholder="Prénom" required>
            </div>



            <input type="email" name="email" v-model="email" placeholder="Email" required>

            <input type="password" name="password" v-model="password" placeholder="Mot de passe" required>

            <input type="text" name="adress" v-model="adress" placeholder="Adresse" required>

            <div class="row">
                <input type="text" name="city" v-model="city" placeholder="Ville" required>

                <select name="civility" id="civility" v-model="civility" required>
                    <option value="" disabled selected>civilité </option>
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select>
            </div>

            <input type="text" name="phone_number" v-model="phone_number" placeholder="Numéro de téléphone" required>

            <div class="row">
                <div class="checkbox">
                    <label for="checkbox">Accepter les conditions</label>
                    <input type="checkbox" v-model="acceptedTerms" id="checkbox" required>
                </div>
                <button :disabled="isSubmitting" type="submit" class="btn btn-primary">Inscrivez-vous</button>
            </div>




        </form>
        <div class="conexxion">
            <router-link :to="{ name :'login'} " ><div class="btn btn-login">Connexion</div></router-link>

        </div>
    </section>
</template>

<script>
import axios from "axios";
import CryptoJS from "crypto-js";

export default {
    data() {
        return {
            first_name: '',
            last_name: '',
            civility: '',
            email: '',
            password: '',
            adress: '',
            city: '',
            phone_number: '',
            acceptedTerms: false,
            isSubmitting: false,
            errorMessage: '',
            successMessage: ''
        };
    },
    methods: {
    async registerAction() {
        if (!this.acceptedTerms) {
            this.errorMessage = "Vous devez accepter les conditions.";
            return;
        }

        this.isSubmitting = true;
        this.errorMessage = '';
        this.successMessage = '';

        try {
            // Chiffrement du mot de passe avant l'envoi
            const encryptedPassword = this.encryptPassword(this.password);

            // Envoyer les données à l'API avec le mot de passe chiffré
            await axios.post("http://127.0.0.1:8000/api/User/post", {
                first_name: this.first_name,
                last_name: this.last_name,
                civility: this.civility,
                email: this.email,
                password: encryptedPassword, // Utiliser le mot de passe chiffré
                adress: this.adress,
                city: this.city,
                phone_number: this.phone_number,
            });

            this.successMessage = "Inscription réussie !";
            this.clearForm();
        } catch (error) {
            this.errorMessage = error.response?.data?.message || "Une erreur est survenue lors de l'inscription.";
        } finally {
            this.isSubmitting = false;
        }
    },

    encryptPassword(password) {
        const keyValue = 'une_clé_unique_pour_ton_app';  // Clé à définir de manière sécurisée
        const ivKey = CryptoJS.lib.WordArray.random(16);  // Génère un IV aléatoire

        // Génère la clé avec PBKDF2
        const key = CryptoJS.PBKDF2(keyValue, 'salt', { keySize: 256 / 32, iterations: 100 });

        // Chiffre le mot de passe avec AES
        const encrypted = CryptoJS.AES.encrypt(password, key, {
            iv: ivKey,
            mode: CryptoJS.mode.CBC
        });

        // Retourne le mot de passe chiffré en Hexadécimal
        return encrypted.ciphertext.toString(CryptoJS.enc.Hex);
    },

    clearForm() {
        this.first_name = '';
        this.last_name = '';
        this.civility = '';
        this.email = '';
        this.password = '';
        this.adress = '';
        this.city = '';
        this.phone_number = '';
        this.acceptedTerms = false;
    }
}
};
</script>

<style scoped>
section {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin-top: 1rem;

}

form {
    width: 30%;
    height: 90%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    align-items: center;
    background-color: var(--dark);
    border-radius: 20px;

}

.error {
    color: red;
    font-size: 2rem;
    font-weight: bolder;
}

.success {
    color: var(--primary);
    font-size: 2rem;
    font-weight: bolder;
}


h1 {
    font-size: 2rem;
    padding: 2rem;
    color: var(--white);
}

input {
    width: 90%;
    padding: 0.3rem;
    margin: 1rem;
    border-radius: 15px;
}

input,
placeholder {
    font-size: 1.5rem;
    text-align: center;
}

.row {
    width: 100%;
    padding: 1rem;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.row input {
    width: 50%;
}

.row select {
    width: 20%;
    height: 4vh;
    border-radius: 15px;
    margin-top: 1.2rem;
}

select,
placeholder {
    font-size: 1.5rem;
    text-align: center;
}

.checkbox {
    display: flex;
    flex-direction: row;
}

.checkbox label {
    color: var(--white);
}

.conexxion{


}
.btn {
  padding: 10px 50px;
  border-radius: 15px;
  text-decoration: none;
  font-size: x-large;
  cursor: pointer;
  
 
}
a{
      text-decoration: none;

  }

.btn-login{
    background-color: var(--secondary);
    color: var(--primary);
}
</style>
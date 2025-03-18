<template>
    <div class="row min-vh-100">
        <!-- Sidebar -->
        <div class="d-none col-md-3 d-md-flex justify-content-center align-items-center sidebar">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
        </div>

        <!-- Affichage des posts -->
        <div v-if="posts.length === 0"
            class="col-md-6 mt-3 d-flex justify-content-center align-items-center bg-white p-3 rounded content">
            <div class="spinner-border" role="status">
                <span class="sr-only"></span>
            </div>
        </div>

        <!-- Liste des posts -->
        <div v-else class="col-md-6 mt-3 rounded overflow-y-scroll p-3 content bg-white">
            <div v-for="post in posts" :key="post.id">
                <router-link @click="openModal(post)" data-bs-toggle="modal" data-bs-target="#modal_content"
                    class="text-decoration-none">
                    <div class="card mb-3">
                        <div class="card-header">
                            <p class="btn btn-dark">{{ post.user ? post.user.pseudo : 'Utilisateur inconnu' }}</p>
                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                                {{ post.content }}</p>
                        </div>
                        <div v-if="post.image" class="card-body">
                            <img :src="`/storage/${post.image}`" alt="Image du post" class="img-fluid" />
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>{{ post.comments ? post.comments.length : 0 }} commentaires</p>
                            <p>60 réactions</p>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>

        <!-- Modal pour afficher les détails du post et ajouter un commentaire -->
        <div class="modal modal-lg fade" id="modal_content" tabindex="-1" aria-labelledby="modal_contentLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="modal-title btn btn-dark" id="modal_contentLabel">{{ selectedPost?.user ?
                            selectedPost.user.pseudo : 'Utilisateur inconnu' }}</button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ selectedPost?.content }}</p>
                        <div v-if="selectedPost?.image">
                            <img :src="`/storage/${selectedPost.image}`" alt="Image du post" class="img-fluid" />
                        </div>

                        <!-- Affichage des commentaires -->
                        <div v-if="selectedPost?.comments && selectedPost.comments.length > 0" class="mt-3">
                            <h5>Commentaires:</h5>
                            <ul>
                                <li v-for="comment in selectedPost.comments" :key="comment.id">
                                    <p><strong>{{ comment.user.pseudo }}:</strong> {{ comment.comment }}</p>
                                </li>
                            </ul>
                        </div>

                        <!-- Formulaire d'ajout de commentaire -->
                        <div class="mt-3">
                            <textarea v-model="newComment" class="form-control" placeholder="Ajouter un commentaire"
                                rows="3"></textarea>
                            <button @click="addComment" class="btn btn-primary mt-2">Ajouter un commentaire</button>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <p>Lorem, ipsum.</p>
                        <p>Lorem, ipsum.</p>
                    </div>
                </div>
            </div>
        </div>

        <FooterVue />
    </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import FooterVue from "../layout/Footer.vue";

const router = useRouter();
const posts = ref([]);
const selectedPost = ref(null);
const newComment = ref("");

// Fonction pour récupérer les posts
const fetchPosts = () => {
    const token = localStorage.getItem("auth_token");
    if (!token) {
        router.push("/login");
        return;
    }

    axios
        .get("http://127.0.0.1:8000/api/posts", {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        })
        .then((response) => {
            posts.value = response.data.map(post => {
                return {
                    ...post,
                    user: post.user || { pseudo: 'Utilisateur inconnu' }, // Valeur par défaut si l'utilisateur est absent
                    comments: post.comments || [] // Assurer que `comments` existe toujours
                };
            });
        })
        .catch((error) => {
            console.error("Erreur de récupération des posts", error);
            alert("Erreur de récupération des posts");
        });
};

// Fonction pour ouvrir le modal avec les détails du post
const openModal = (post) => {
    selectedPost.value = post;
    newComment.value = ""; // Réinitialiser le commentaire
};

// Fonction pour ajouter un commentaire
const addComment = () => {
    if (!newComment.value.trim()) {
        alert("Veuillez entrer un commentaire.");
        return;
    }

    const token = localStorage.getItem("auth_token");
    if (!token) {
        router.push("/login");
        return;
    }

    const postId = selectedPost.value.id;
    axios
        .post(`http://127.0.0.1:8000/api/posts/${postId}/comments`, {
            comment: newComment.value,
        }, {
            headers: {
                Authorization: `Bearer ${token}`,
            },
        })
        .then((response) => {
            // Ajouter le nouveau commentaire à la liste des commentaires du post sélectionné
            selectedPost.value.comments.push(response.data.comment);
            newComment.value = ""; // Réinitialiser le champ de commentaire
        })
        .catch((error) => {
            console.error("Erreur lors de l'ajout du commentaire", error);
            alert("Erreur lors de l'ajout du commentaire");
        });
};

onMounted(() => {
    fetchPosts(); // Récupérer les posts au montage
});
</script>

<style scoped>
.row.min-vh-100 {
    min-height: 100vh;
}

.sidebar {
    background-color: #f8f9fa;
    min-height: 100vh;
}

.content {
    overflow-y: auto;
    height: 100vh;
}

.card {
    border-radius: 0.375rem;
}

textarea {
    resize: none;
}
</style>

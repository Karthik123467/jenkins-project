pipeline {
    agent any
    environment {
        REPO_URL = 'https://github.com/Karthik123467/php-docker-stack-demo.git'
        CLONE_DIR = 'php-docker-stack-demo' // Directory where the repo will be cloned
    }
    stages {
        stage('Clone Repository') {
            steps {
                script {
                    // Clone the repository to the specified directory
                    sh "git clone ${REPO_URL} ${CLONE_DIR}"
                }
            }
        }
        stage('Run Docker Compose') {
            steps {
                script {
                    // Navigate to the cloned directory and run docker-compose
                    dir(CLONE_DIR) {
                        isUnix() ? sh("docker-compose up ") : bat("docker-compose up")
                    }
                }
            }
        }
    }
    post {
        failure {
            echo '❌ Build or deployment failed!'
        }
        success {
            echo '✅ App deployed successfully.'
        }
    }
}

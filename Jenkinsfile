pipeline {
    agent any
    environment {
        REPO_URL = 'https://github.com/Karthik123467/php-docker-stack-demo.git'
        CLONE_DIR = 'php-docker-stack-demo2'
    }
    stages {
        stage('Clone Repository') {
            steps {
                script {
                    // Use bat for Windows shell
                    bat "git clone %REPO_URL% %CLONE_DIR%"
                }
            }
        }
        stage('Run Docker Compose') {
            steps {
                script {
                    dir(CLONE_DIR) {
                        // Use bat to run docker-compose
                        bat "docker-compose up --build -d"
                    }
                }
            }
        }
        stage('Check Docker Logs') {
            steps {
                script {
                    dir(CLONE_DIR) {
                        bat "docker-compose logs --tail=50"
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

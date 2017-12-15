node {
 	// Clean workspace before doing anything
    deleteDir()

    try {
        stage ('Clone') {
        	checkout scm
        }
        stage ('Install') {
        	sh "composer install"
        }
        stage ('Tests') {
            sh "echo 'shell scripts to create DB and settings for integration tests'"
	        parallel 'static': {
	            sh "echo 'shell scripts to run static tests...'"
	        },
	        'unit': {
	            sh "echo 'shell scripts to run unit tests...'"
	        },
	        'integration': {
	            sh "echo 'shell scripts to run integration tests...'"
	        }
        }
        stage ('Artifact') {
            sh "VERSION=${BRANCH_NAME} build"
        }
        if (BRANCH_NAME == 'develop') {
      	    stage ('Deploy') {
                sh "ssh -p 22 ${DEV_SERVER_USER}@${DEV_SERVER_HOST} 'VERSION=${BRANCH_NAME} deploy.sh'"
      	    }
      	}
      	stage ('Clean Up') {
            deleteDir()
        }
    } catch (err) {
        currentBuild.result = 'FAILED'
        throw err
    }
}